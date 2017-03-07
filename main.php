<?php
//mail("waspiks@live.ru","1",serialize($_GET));
$_GET[pass] = md5($_GET[token]. "3ef707df95d1252fd80e52a749464fa5");
unset($_GET[token]);
$file = "Authorithation.json";
file_put_contents($file, json_encode($_GET));
