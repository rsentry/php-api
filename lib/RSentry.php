<?php
class RSentry
{
	private $apikey;
	private $target = 'http://localhost:5000/v1/';
	private $errors = array();

	function __construct($apikey)
	{
		$this->apikey = $apikey;
	}

	private function _addError($msg)
	{
		$this->errors[] = $msg;
	}

	public function errors()
	{
		return $this->errors;
	}

	private function _requestResource($loc,$method='get',$params=array())
	{
		//empty out errors
		$this->errors = array();
		//if apikey doesn't exist throw error
		if($this->apikey == '')
		{
			$this->_addError('Invalid API Key');
		}
		//setup curl call
		$curl = curl_init();
		//init options
		$options = array();
		//if get request
		if($method == 'get')
		{
			$options[CURLOPT_HTTPGET] = 1;
			if(count($params) > 0)
			{
				$loc = $loc . '?' . http_build_query($params, null, '&');
			}
		}
		//if post request
		elseif($method == 'post')
		{
			$options[CURLOPT_POST] = 1;
			if(count($params) > 0)
			{
				$options[CURLOPT_POSTFIELDS] = http_build_query($params, null, '&');
			}
		}
		elseif($method=='put')
		{
			$options[CURLOPT_CUSTOMREQUEST] = 'PUT';
			if(count($params) > 0)
			{
				$options[CURLOPT_POSTFIELDS] = http_build_query($params, null, '&');
			}
		}
		elseif($method=='delete')
		{
			$options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
			$loc = $loc . '?' . http_build_query($params, null, '&');
		}
		else //not valid method
		{
			$this->_addError('Invalid method:' . $method);
			return false;
		}

		//set curl options
		$options[CURLOPT_CONNECTTIMEOUT] = 60;
		$options[CURLOPT_RETURNTRANSFER] = 1;
		$options[CURLOPT_FOLLOWLOCATION] = 1;
		$options[CURLOPT_URL] = utf8_encode($this->target . $loc);
		$options[CURLOPT_USERPWD] = $this->apikey . ':';
		$options[CURLOPT_TIMEOUT] = 120;

		//set options and execute
		curl_setopt_array($curl, $options);
		$msgbody = curl_exec($curl);

		//if there is a curl error
		if($msgbody === false)
		{
			switch (curl_errno($curl)) 
			{
				case CURLE_COULDNT_CONNECT:
				case CURLE_COULDNT_RESOLVE_HOST:
				case CURLE_OPERATION_TIMEOUTED:
					$this->_addError("Could not connect to RestaurantSentry.com at '$this->target'.  Please confirm your internet connection and try again.  You can check RestaurantSentry.com's service status at https://twitter.com/rsentry, or let us know at support@restaurantsentry.com.");
					break;
				case CURLE_SSL_CACERT:
				case CURLE_SSL_PEER_CERTIFICATE:
					$this->_addError("Could not verify SSL certificate.  If this problem persists, let us know at support@restaurantsentry.com.");
					break;
				default:
					$this->_addError("Unexpected error communicating with RestaurantSentry.  Let us know if this problem continues at support@restaurantsentry.com.");
			}
			return false;
		}

		//get http status code
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		//if error, put messages in error array
		if($httpcode < 200 || $httpcode > 299)
		{
			$messages = json_decode($msgbody);
			if($messages == null)
			{
				$this->_addError('Message id malformed');
			}
			else
			{
				foreach ($messages->messages as $message)
				{
					$this->_addError($message->msg);
				}
			}
			return false;
		}
		//return message body
		return $msgbody;
	}

	public function getSalesSheet($values)
	{
		if(is_array($values))
		{
			$return = $this->_requestResource('sales.json','get',$values);
		}
		else
		{
			$return = $this->_requestResource("sales/$values.json",'get');
		}
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}		
	public function createSalesSheet($values)
	{
		$return = $this->_requestResource('sales.json','post',$values);
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}		
	public function deleteSalesSheet($id)
	{
		$return = $this->_requestResource("sales/$id.json",'delete');
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}		

	public function updateSalesSheet($id, $values)
	{
		$return = $this->_requestResource("sales/$id.json",'put', $values);
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}

	public function createSalesDetail($sales_id, $values)
	{
		$return = $this->_requestResource("sales/$sales_id/details.json",'post', $values);
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}
	public function getSalesDetail($sales_id,$values)
	{
		if(is_array($values))
		{
			$return = $this->_requestResource("sales/$sales_id/details.json",'get',$values);
		}
		else
		{
			$return = $this->_requestResource("sales/$sales_id/details/$values.json",'get');
		}
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}		
	public function getSalesDetailByPlu($sales_id, $plu)
	{
		$return = $this->_requestResource("sales/$sales_id/details/$plu.json?pluoverride=true",'get');
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}
	public function getSalesDetailByCategory($sales_id, $supers=false)
	{
		$args = '';
		if($supers===true)
		{
			$args = '?supers=true';
		}
		$return = $this->_requestResource("sales/$sales_id/details/categories.json$args",'get');
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}
	public function updateSalesDetail($sales_id,$mixed_id, $values, $pluoverride=false)
	{
		if($pluoverride === true)
		{
			$values['pluoverride'] = 'true';
		}
		$return = $this->_requestResource("sales/$sales_id/details/$mixed_id.json",'put', $values);
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}
	public function deleteSalesDetail($sales_id,$mixed_id,$pluoverride=false)
	{
		$args = '';
		if($pluoverride === true)
		{
			$args = '?pluoverride=true';
		}
		$return = $this->_requestResource("sales/$sales_id/details/$mixed_id.json$args",'delete');
		if ($return === false)
		{
			return false;
		}
		return json_decode($return);
	}		
}
?>
