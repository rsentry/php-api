<?php
class RSentryException extends Exception
{
	const BADREQUEST = 400;
	const UNAUTHORIZED = 401;
	const REQUESTFAILED = 402;
	const FORBIDDEN = 403;
	const NOTFOUND = 404;
	const SERVERERROR = 500;

	public function __construct($message, $http_code, $http_body='')
	{
		//handle body to create message
		$msg = '';
		if($http_body != '')
		{
			$body = json_encode($http_body);
		}
		elseif ($message != '')
		{
			$msg = $message;
		}
		elseif ($body == null)
		{
			switch($http_code)
			{
				case self::BADREQUEST:
					$msg = 'Invalid or Bad Request';
					break;
				case self::UNAUTHORIZED:
					$msg = 'You are not logged in properly';
					break;
				case self::REQUESTFAILED:
					$msg = 'Request was valid but failed';
					break;
				case self::FORBIDDEN:
					$msg = 'You do not have access to this resource';
					break;
				case self::NOTFOUND:
					$msg = 'We were unable to find this resource';
					break;
				case self::SERVERERROR:
					$msg = 'There was an internal server error';
					break;
			}
		}	
		parent::__construct($msg, $http_code);
	}

}
?>
