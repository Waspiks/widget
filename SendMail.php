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
   <div>
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
      </p>
      <table>
         <tr style=\"display: block;\">
            <td id=\"tovar\" style=\"width : 25%;\"> Наименование </td>
            <td id=\"quantity\" style=\"width : 5%;\"> Кол-во       </td>
            <td id=\"model\" style=\"width : 45%;\"> Параметры      </td>
            <td id=\"price\" style=\"width : 10%;\"> Стоимость    </td>
            <td id=\"pict\" style=\"width : auto;\"> Эскиз    </td>
         </tr>"
;

foreach($datamsv[order_lines] as $N => $line){
	if ($line[comment] == ""){
		$url="http://InSalesOrderWidget:ce87f63b67e9c7cb3a6bc288ecafbb54@shop-76661.myinsales.ru/admin/products/".$line[product_id].".json";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$nocommentmsv = json_decode(curl_exec($ch), true);
		curl_close($ch);
//			$link = substr(strstr($value, "Изображение : "), 24);
		$message .= "<tr style=\"display: block;\" ><td id=\"tovar\" style=\"width : 25%;\">".$nocommentmsv[title]."</td>
						<td id=\"quantity\" style=\"width : 5%;\">".$line[quantity]."</td>
						<td id=\"model\"></td>
						<td id=\"color\"></td>
						<td id=\"\"></td>
						<td id=\"age\"></td>
						<td id=\"size\">".$nocommentmsv[characteristics][1][title]."</td>
						<td id=\"price\">".(int)$nocommentmsv[variants][0][price]."</td>"
		;
		if (!empty($nocomentmsv[image])){
			$message .= "<td>Нет изображения</td></tr>";
		} else {
			$message .= "<td><img src=\"".$nocommentmsv[images][0][original_url]."\"alt=\"".$nocommentmsv[title]."\"width=\"100\" height=\"150\" align=\"right\"></td></tr>";
		}

	} else{
		$commenties = split("--------------------", $line[comment]);
		$delete = array_pop($commenties);
		foreach($commenties as $value){
			$link = substr(strstr($value, "Изображение : "), 24);
			$message .= "<tr style=\"display: block;\" ><td id=\"tovar\" style=\"width : 25%;\" >".$line[title]."</td>
							<td id=\"quantity\" style=\"width : 5%;\"> 1</td>";
			$parameters = array(
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
			}
			$message .= "<td>".substr(strstr($value, "Стоимость : "), 20, strpos(strstr($value, "Стоимость : "), "\n")-20)."</td>
			<td><img src=".$link."alt=\"".$line[title]."\"width=\"100\" height=\"150\" align=\"right\"></td></tr>";
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
			-<br>
			С уважением,<br>
			магазин <a href='http://poduschki.ru'>\"Купи Презент\"</a>
		</p>
		</div>
   </body>
</html>";

$headers = "Content-type: text/html; charset=utf-8\n";
$headers .= "From: <service@poduschki.ru>";

mail("alex.bityuckov@yandex.ru", $title, $message, $headers); //waspiks@live.ru
mail("waspiks@live.ru", $title, $message, $headers);

