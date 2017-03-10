<?php
$datamsv = json_decode($HTTP_RAW_POST_DATA, true);
$email = $datamsv[client][email];
$title = "Заказ";
$from = "From: My Name <admin@site.com>";
mail("waspiks@live.ru", $title, $email, $from);

foreach ( $datamsv[order_changes] as $key => $value) {
}
