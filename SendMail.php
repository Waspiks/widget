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
   <div style='background-color: #DFE9F0;color: #2A5594;font-size: 12px !important;font-weight: normal;margin: 0px 1px 0px 0px;padding: 3px 8px;text-decoration: none;white-space: nowrap;'>
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
            <td> Наименование </td>
            <td> Кол-во        </td>
            <td> Стоимость     </td>
         </tr>"
;

$sum = 0;
foreach($datamsv[order_lines] as $N => $line){
	if ($line[comment] != NULL){
		$commenties = split("--------------------", $line[comment]);
		foreach($commenties as $value){
			$link = substr(strstr($value, "Изображение : "), 24);
			$message .= "<tr><td>".$line[title]."</td><td> 1</td><td>".substr(strstr($value, "Стоимость : "), 20, strpos(strstr($value, "Стоимость : "), "\n")-20).
			"</td><td><img src=".$link."alt=\"".$line[title]."\"width=\"80\", height=\"150\", align=\"right\"></td></tr>";
			$sum += substr(strstr($value, "Стоимость : "), 20, strpos(strstr($value, "Стоимость : "), "\n")-20);
		}
	}
} 

$sum += 300; 
$message .= "Стоимость: ".$sum."руб\n
		Доставка: +300".$line[delivery_title]." ".$line[delivery_description]."
		</p>
		<p>
			Общая стоимость заказа: ".$sum."\n"
			.$line[payment_description].
			"Заказ еще не оплачен.\n
			(Хотите оплатить заказ сейчас?)
		</p>
		<p>
			Вы можете также посмотреть страницу статуса заказа или вернуться в магазин.
		</p>
		<p>
			-\n
			С уважением,\n
			магазин \"Купи Презент\"\n
			http://www.poduschki.ru
		</p>
		</div>
   </body>
</html>";

$headers = 'Content-type: text/html; charset=utf-8';
$headers .= 'service@poduschki.ru';

mail("waspiks@live.ru", $title, $message, $headers);


