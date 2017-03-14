<?php
$datamsv = json_decode($HTTP_RAW_POST_DATA, true);
$to = $datamsv[client][email];
$title = "Заказ";
$from = "From: <service@poduschki.ru>";

$message = "<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
      <title>HTML Document</title>
   </head>
   <body>
   <div style=\"font-family: Arial, sans-serif;color:#333\">
      <p>
         Здравствуйте, ".$datamsv[client][middlename]." ".$datamsv[client][name]."!
      </p>
      <p>
         Спасибо, что воспользовались услугами нашего интернет-магазина \"Купи Презент\"
      </p>
      <p>
         Номер вашего заказа №".$datamsv[number]."
      </p>
      <p>
         Внимательно проверьте Ваш заказ, а также описание товаров
      </p>";

$imStyle = "style = \"display : inline-block; width : 33%; padding: 0px 0px 0px 0px; margin: 5px; text-align : center;box-shadow: 0 0 10px rgba(0,0,0,0.5);\"";

foreach($datamsv[order_lines] as $N => $line){
	if ($line[comment] == ""){

		$url="http://InSalesOrderWidget:ce87f63b67e9c7cb3a6bc288ecafbb54@shop-76661.myinsales.ru/admin/products/".$line[product_id].".json";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$nocommentmsv = json_decode(curl_exec($ch), true);
		curl_close($ch);

		if (!empty($nocomentmsv[image])){
			$message .= "<div><div ".$imStyle.">Нет изображения</div>";
		} else {
			$message .= "<div ".$imStyle."><img style=\"width: 100%;\" src=\"".$nocommentmsv[images][0][original_url]."\"alt=\"".$nocommentmsv[title]."\"></div>";
		}

		$message .= "
			<div style= \"display : inline-block;vertical-align : top;margin:10px;width: 50%;\">
				<div style=\"font-weight:bold;font-size : 125%;\">".$nocommentmsv[title]."</div>
				<div style=\"color : gray;font-size : 110%;\">".$line[quantity]." X ".$nocommentmsv[variants][0][price]." руб.</div>
			</div></div>";
	} else{
		$commenties = split("--------------------", $line[comment]);
		$delete = array_pop($commenties);
		foreach($commenties as $value){
			$link = substr(strstr($value, "Изображение : "), 24);

			$message .= "<div><div ".$imStyle."><img style=\"width: 100%;\" src=".$link."alt=\"".$line[title]."\"></div>";

			$message .= "
			<div style= \"display : inline-block;vertical-align : top;margin:10px;width: 50%;\">
				<div style=\"font-weight:bold;font-size : 125%;\">".$line[title]."</div>
				<div style=\"color : gray;font-size : 110%;\">1 X ".substr(strstr($value, "Стоимость : "), 20, strpos(strstr($value, "Стоимость : "), "\n")-21).".0 руб.</div>
			</div></div>";

			/*$parameters = array(
				"Модель: "  => substr(strstr($value, "Модель : "), 15, strpos(strstr($value, "Модель : "), "\n")-15)."<br>",
				"Цвет: "    => substr(strstr($value, "Цвет : "), 11, strpos(strstr($value, "Цвет : "), "\n")-11)."<br>",
				"Пол: "     => substr(strstr($value, "Пол : "), 9, strpos(strstr($value, "Пол : "), "\n")-9)."<br>",
				"Возраст: " => substr(strstr($value, "Возраст : "), 16, strpos(strstr($value, "Возраст : "), "\n")-16)."<br>",
				"Размер: "  => substr(strstr($value, "Размер : "), 14, strpos(strstr($value, "Размер : "), "\n")-14)."<br>"
				);
			foreach($parameters as $param => $val){
				if ( $val != "" ){
					$message .= $param.$val;
				}
			}*/
		}		
	}
} 
		$message .= "</table>";
		$message .= "Стоимость: ".$datamsv[items_price]." руб<br>
		Доставка: ".$datamsv[full_delivery_price]." ".$line[delivery_title]." ".$line[delivery_description]."
		</p>
		<p>
			\nОбщая стоимость заказа: ".$datamsv[total_price]."<br>"
			.$line[payment_description].
			"
		</p>
		<p>
			<br>
			С уважением,<br>
			магазин <a href='http://poduschki.ru'>\"Купи Презент\"</a>
		</p>
		</div>
   </body>
</html>";

$headers = "Content-type: text/html; charset=utf-8\n";
$headers .= "From: <service@poduschki.ru>";

mail("bin.dev8@gmail.com", $title, $message, $headers);

