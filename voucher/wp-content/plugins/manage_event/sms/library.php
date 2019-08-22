<?php
if(!function_exists('sendFromOneHealth')){
	function sendFromOneHealth($phoneNumber, $content)
	{
	    //ini_set("soap.wsdl_cache_enabled", "0");
	    ini_set('soap.wsdl_cache_enabled',0);
	    ini_set('soap.wsdl_cache_ttl',0);
	    $status = 200;
	    $message = 'Success';
	    $url_xml = plugin_dir_url(__FILE__).'sms.xml';	    
	   /* $client = new SOAPClient($url_xml);
	    var_dump($client);
	    $response = $client->__soapCall('sendSms', array(
	        'sendSms' => array(
	             'code' => 'OneHealth!@2o14',
	             'account' => 'OneHealth',
	             'phone' => $phoneNumber,
	             'from' => 'OneHealth',
	             'sms' => $content,
	             'message' => 'hhso'
	        )
	     ));
	    return _getCause($response->return);*/
	    return $url_xml;
	    //$response = -3;
	    //return _getCause($response);
	}
}
if(!function_exists('_getCause')){
	function _getCause($responseCode)
	{
	    switch ($responseCode) {
	        case -3:

	            return "Out of quota";

	        case -4:

	            return "Not enough params";

	        case -5:

	            return "Recipient invalid";

	        case -6:

	            return "Message is null";

	        case -7:

	            return "BrandName is null";

	        case -8:

	            return "Ip address Invalid";
	        case -9:

	            return "BrandName not register";

	        case -10:

	            return "Recipient not receiver SMS message";

	        case -11:

	            return "User postpaid";

	        case -12:

	            return "BrandName has existed in system";

	        case -13:

	            return "Ip has existed in system";

	        case -14:

	            return "Out of length message";

	        case -15:

	            return "Not support telcos";

	        case -17:

	            return "Authentication faild";

	        case -20:

	            return "Brandname existed";

	        case -21:

	            return "Out of limit recipient (500 recipients) (use for sendSmsToListPhone)";

	        default:
	            return "Success";
	    }
	}
}
