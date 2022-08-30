<?php

$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.dataaccess.com/webservicesserver/numberconversion.wso?WSDL",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => 
  "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:web=\"http://www.dataaccess.com/webservicesserver/\">\n   
	  <soapenv:Header/>\n   
	  <soapenv:Body>\n      
		    <web:NumberToWords>\n         
			  <ubiNum>100</ubiNum>\n      
		    </web:NumberToWords>\n   
	  </soapenv:Body>\n
  </soapenv:Envelope>",
  CURLOPT_HTTPHEADER => array("content-type: text/xml"),
));
 
$response = curl_exec($curl);
$err = curl_error($curl);
 
curl_close($curl);
 
if ($err) {
  echo "cURL Error #:" . $err;
} else {

    $xml = simplexml_load_string( esc_xml($response) );
  
    $array = json_decode(json_encode((array)$xml),true);

    var_dump($xml);

}