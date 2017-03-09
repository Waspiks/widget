<?php
//mail("waspiks@live.ru", "1", serialize($_GET));
$_GET[pass] = md5($_GET[token]. "28429c6d2678d9cfc2da840e16489be5");
unset($_GET[token]);
$file = "Authorithation.json";
file_put_contents($file, json_encode($_GET));
$link = "http://InSalesOrderInfo:".$_GET[pass]."@helixmedia.myinsales.ru/admin/webhooks.xml";
$data = '<webhook> <address>http://lovemyrobe.ru/InSalesOrderInfo/SendMale.php</address> <topic>orders/create</topic> <format-type>json</format-type> </webhook>';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Content-Type: application/xml"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$output = curl_exec($ch);
curl_close($ch);