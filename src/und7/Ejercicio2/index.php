<?php
//define el endpoint del servicio web
$url = "http://www.dneonline.com/calculator.asmx";

//definimos los valores que vamos a enviar


//definimos el XML que se enviará en la solicitud
$xml_post_string = '<?xml version="1.0"?>

<soap:Envelope
xmlns:soap="https://www.w3.org/2003/05/soap-envelope/"
soap:encodingStyle="https://www.w3.org/2003/05/soap-encoding">

<soap:Body>
  <m:GetUserResponse>
    <m:Username>Tony Stark</m:Username>
  </m:GetUserResponse>
</soap:Body>

</soap:Envelope>';

$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: http://tempuri.org/Add", 
    "Content-length: ".strlen($xml_post_string),
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

//verificamos si hubo algún error
if(curl_errno($ch)){
    echo 'Error:' . curl_error($ch);
}
else{
    //mostramos el resultado
    echo $response;
}
curl_close($ch);
