<?php
$datamsv = json_decode($HTTP_RAW_POST_DATA, true);
$title = "Заказ";
$from = "From: My Name <admin@site.com>";
mail("waspiks@live.ru", $title, serialize($datamsv), $from);


$message = "Здравствуйте, ".$datamsv[client][middlename]." ".$datamsv[client][name]."!Спасибо, что воспользовались услугами нашего интернет-магазина \"Купи Презент\"\nНомер вашего заказа №".$datamsv[number]."\nВнимательно проверьте Ваш заказ, а также описание товаров\nНаименование Кол-во Стоимость\n"
;

$sum = 0;
foreach($datamsv[order_lines] as $N => $line){
	if ($line[comment] != ""){
		$message .= $line[title]." ".$line[quantity]." ".substr(strstr($value, "Стоимость : "), 0, strpos(strstr($value, "Стоимость : "), " "))."\n";
		$commenties = split("--------------------", $line[comment]);
		//ссылки на изображения
		$links = array()
		foreach($commenties as $value){
			array_push($links, strstr($value, "Изображение : "));
			$sum += substr(strstr($value, "Стоимость : "), 0, strpos(strstr($value, "Стоимость : "), " "));
		}
		$sum += 300 //с доставкой
		$message .= "Стоимость: ".$sum."руб\nДоставка: +300".$line[delivery_title]." ".$line[delivery_description]."\p\nОбщая стоимость заказа: ".$sum.\n
		.$line[payment_description]."Заказ еще не оплачен.\n(Хотите оплатить заказ сейчас?)\nВы можете также посмотреть страницу статуса заказа или вернуться в магазин.\n-\nС уважением,\nмагазин \"Купи Презент\"\nhttp://www.poduschki.ru";
	} else {
		$message .= $line[title]." ".$line[quantity];
	}
}
