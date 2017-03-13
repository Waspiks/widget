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
   <div tr {
display: block;
}
td {
display: inline-block;
}

td.tovar {
width : 25%;
}

td.quantity {
width : 5%;
}

td.model {
width : 10%;
}

td.color {
width : 10%;
}

td.age {
width : 10%;
}

td.size {
width : 5%;
}

td.price {
width : 10%;
}

td.picture {
width : auto;
}>
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
         <tr>
            <td class=\"tovar\"> Наименование </td>
            <td class=\"quantity\"> Кол-во       </td>
            <td class=\"model\"> Модель       </td>
            <td class=\"color\"> Цвет         </td>
            <td class=\"\"> Пол          </td>
            <td class=\"age\"> Возраст      </td>
            <td class=\"size\"> Размер       </td>
            <td class=\"price\"> Стоимость    </td>
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
		$message .= "<tr><td class=\"tovar\">".$nocommentmsv[title]."</td>
						<td class=\"quantity\"> 1</td>
						<td class=\"model\"></td>
						<td class=\"color\"></td>
						<td class=\"\"></td>
						<td class=\"age\"></td>
						<td class=\"size\">".$nocommentmsv[characteristics][1][title]."</td>
						<td class=\"price\">".$nocommentmsv[variants][0][price]."</td>"
		;
		if (!empty($nocomentmsv[image])){
			$message .= "<td><img src=\"http://poduschki.ru/images/no_image_large.jpg\" alt=\"".$nocommentmsv[title]."\"width=\"80\" height=\"150\" align=\"right\"></td></tr>";
		} else {
			$message .= "<td><img src=\"".$nocommentmsv[images][0][original_url]."\"alt=\"".$nocommentmsv[title]."\"width=\"80\" height=\"150\" align=\"right\"></td></tr>";
		}

	} else{
		$commenties = split("--------------------", $line[comment]);
		$delete = array_pop($commenties);
		foreach($commenties as $value){
			$link = substr(strstr($value, "Изображение : "), 24);
			$message .= "<tr><td class=\"tovar\">".$line[title]."</td>
							<td class=\"quantity\"> 1</td>
							<td class=\"model\">".substr(strstr($comment, "Модель : "), 15, strpos(strstr($comment, "Модель : "), "\n")-15)."</td>
							<td class=\"color\">".substr(strstr($comment, "Цвет : "), 11, strpos(strstr($comment, "Цвет : "), "\n")-11)."</td>
							<td class=\"\">".substr(strstr($comment, "Пол : "), 9, strpos(strstr($comment, "Пол : "), "\n")-9)."</td>
							<td class=\"age\">".substr(strstr($comment, "Возраст : "), 16, strpos(strstr($comment, "Возраст : "), "\n")-16)."</td>
							<td class=\"size\">".substr(strstr($comment, "Размер : "), 14, strpos(strstr($comment, "Размер : "), "\n")-14)."</td>
							<td class=\"price\">".substr(strstr($value, "Стоимость : "), 20, strpos(strstr($value, "Стоимость : "), "\n")-20)."</td>
			<td><img src=".$link."alt=\"".$line[title]."\"width=\"80\" height=\"150\" align=\"right\"></td></tr>";
		}		
	}
} 
		$message .= "</table>";
		$message .= "Стоимость: ".$datamsv[items_price]." руб\n
		Доставка: ".$datamsv[full_delivery_price]." ".$line[delivery_title]." ".$line[delivery_description]."
		</p>
		<p>
			\nОбщая стоимость заказа: ".$datamsv[total_price]."\n"
			.$line[payment_description].
			"
		</p>
		<p>
			-\n
			С уважением,\n
			магазин <a href='http://poduschki.ru'>\"Купи Презент\"</a>			
		</p>
		</div>
   </body>
</html>";

$headers = "Content-type: text/html; charset=utf-8\n";
$headers .= "From: <service@poduschki.ru>";

mail("waspiks@live.ru", $title, $message, $headers);


