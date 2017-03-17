<?php
$datamsv = json_decode($HTTP_RAW_POST_DATA, true);
$to = $datamsv[client][email];
$title = "Заказ";
$from = "From: <service@poduschki.ru>";

//font-family: Arial, sans-serif;color:#333;

$message = "<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
      <title>HTML Document</title>
   </head>
   <body style=\"background:#F0F5F5;color:#333;text-align:center;\">
   <div style=\"background:#F0F5F5;max-width:1200px;display:inline-block;\">
   	<div style=\"text-align:center;background:#F0F5F5;\">
   	<div style=\"text-align:center;\">
   		<img style=\"width: 100%;border-radius: 8px 8px 0px 0px;display:block;margin:0 auto;\" src=\"http://lovemyrobe.ru/InSalesOrderWidget/4.jpg\" name=\"main_pict\" >
   	</div>
   	</div>
   	<div style=\"background:white;\">
   	<div style=\"background:white;margin:0% 10% 0% 10%;\">
   	<br>
    <div style = \"text-align:center;\">
        <h2 style = \"text-align:center;margin:0px;padding:0px;\">Здравствуйте, ".$datamsv[client][middlename]." ".$datamsv[client][name]."!</h2>
      </div>
    <div style=\"font-weight: bold;font-size : 125%;color:#333;text-align:center;\">
         Спасибо, что воспользовались услугами нашего интернет-магазина \"Купи Презент\"! 
       </div>
       <br>
       <div style=\"text-align: justify;text-indent:5%;color:#333;font-size : 110%;\">Наш магазин предлагает приобрести нужные для дома и практичные, но не безликие подарки, уместные на любом семейном празднике или в дружеском кругу. Праздник приближается, и Вы выбираете между набором чашек и компьютерной мышкой в качестве подарка? Презентуйте дорогому человеку то, что не будет банальным - именную вещь или изделие с оригинальным, неповторимым дизайном. Мы предлагаем \"беспроигрышные\" варианты подарков!
      </div>
      <br>
      <div style=\"font-weight: bold;color:#333;text-align:center;\">
         <h2 style=\"text-align: center;margin:0px;padding:0px;\">Номер вашего заказа № ".$datamsv[number]."</h2>
      </div>
      <div style=\"font-weight: bold;color:#333;text-align:center;\"><h3 style=\"text-align: center;margin:0px;padding:0px;\">
         Внимательно проверьте Ваш заказ, а также описание товаров</h3>
         <br>
      </div> 
		<br>
      <hr style=\"border:none;background-color:black;margin:0px;padding:0px;\" size=3  />";

$imStyle = "style = \"display : inline-block; width : 33%; padding: 10px 0px 0px 0px; text-align : center;\"";

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
			$message .= "<div><div ".$imStyle."><img style=\"width: 100%;box-shadow: 0 0 10px rgba(0,0,0,0.5);margin:0 auto;\" src=\"".$nocommentmsv[images][0][original_url]."\"alt=\"".$nocommentmsv[title]."\"></div>";
		}

		$message .= "
			<div style= \"display : inline-block;vertical-align : top;width: 50%;margin:10px 0px 0px 10px; text-align:left;\">
				<div style=\"font-weight:bold;font-size : 125%;color:#333;\">".$nocommentmsv[title]."</div>
				<div style=\"color : gray;font-size : 110%;\">".$line[quantity]." X ".$nocommentmsv[variants][0][price]." руб.</div>
			</div></div><hr style=\"border:none;background-color:black;\" size=3  />";
	} else{
		$commenties = split("--------------------", $line[comment]);
		$delete = array_pop($commenties);
		foreach($commenties as $value){
			$link = substr(strstr($value, "Изображение : "), 24);

			$message .= "<div><div ".$imStyle."><img style=\"width: 100%;box-shadow: 0 0 10px rgba(0,0,0,0.5);margin:0 auto;\" src=".$link."alt=\"".$line[title]."\"></div>";

			$message .= "
			<div style= \"display : inline-block;vertical-align : top;width: 50%;margin:10px 0px 0px 10px; text-align:left;\">
				<div style=\"font-weight:bold;font-size : 125%;color:#333;\">".$line[title]."</div>
				<div style=\"color : gray;font-size : 110%;\">1 X ".substr(strstr($value, "Стоимость : "), 20, strpos(strstr($value, "Стоимость : "), "\n")-21).".0 руб.</div>
			</div></div><hr style=\"border:none;background-color:black;\" size=3  />";
		}		
	}
} 
		$message .= "
		<div style=\"font-weight: bold;font-size : 125%;color:#333;\">Стоимость : ".$datamsv[items_price]." руб
		</div>
		<div style=\"font-weight: bold;font-size : 125%;\">
			Доставка : ".$datamsv[full_delivery_price]." ".$line[delivery_title]." ".$line[delivery_description]."
		</div>
		<div style=\"font-weight: bold;font-size : 125%;color:#333;\">
			\nОбщая стоимость заказа : ".$datamsv[total_price].$line[payment_description].
			"
		</div>
		<hr style=\"border:none;background-color:black;\" size=3  />
		<br>
		<div style=\"text-align:center;font-size : 125%;font-weight: bold;color:#333;\">Хотите ещё больше товаров?</div>
		<br>
		<a href=\"http://www.poduschki.ru/collection/imennye-podushki/product/podushka-s-imennoy-vyshivkoy-tsveta-v-assortimente\">
		<div style=\"text-align:center;\">
		<div style=\"text-align:center;display:inline-block;\">
		<div style=\"\">
			<img style=\"width: 100%;display:block;margin:0 auto;\" src=\"http://lovemyrobe.ru/InSalesOrderWidget/5.jpg\" name=\"main_pict\" >
		</div>
		<div style=\"font-weight: bold;font-size : 125%;text-align:center;color:#333;\"><br>Подушка с именной вышивкой</div>
		</div>
		</div>
		</a><br>
		<div style=\"text-align:center;\"><a href=\"http://www.poduschki.ru/collection/recommend/product/zhenskiy-imennoy-halat-s-vyshivkoy\"><div style=\"display:inline-block;width:50%;vertical-align:top;\"><div><img style=\"width: 100%;display:block;margin:0 auto;\" src=\"http://lovemyrobe.ru/InSalesOrderWidget/2.jpg\" name=\"main_pict\" ></div><div style=\"font-weight: bold;font-size : 125%;color:#333;\"><br>Женский именной халат</div></div></a><a href=\"http://www.poduschki.ru/collection/mahrovye-polotentsa-2\"><div style=\"display:inline-block;width:50%;vertical-align: top;\"><div><img style=\"width: 100%;display:block;margin:0 auto;\" src=\"http://lovemyrobe.ru/InSalesOrderWidget/1.jpg\" name=\"main_pict\" ></div><div style=\"font-weight: bold;font-size : 125%;color:#333;\"><br>Именное махровое полотенце</div></div></a></div><br>
		<div style=\"color : gray;text-indent:5%;text-align:justify;\">
		Принимаем индивидуальные заказы на изготовление подарков с именной, индивидуальной вышивкой, также подарки с вышивкой марки любимого автомобиля или любого другого дизайна по Вашему макету.
		</div>
		<br>
		<div style=\"color : gray;text-align:center;\">
			С уважением, магазин <a href='http://poduschki.ru'>\"Купи Презент\"</a>
		</div></div></div><div>
   </body>
</html>";

$headers = "Content-type: text/html; charset=utf-8\n";
$headers .= "From: <service@poduschki.ru>";

mail("alex.bityuckov@yandex.ru", $title, $message, $headers);
mail("bin.dev8@gmail.com", $title, $message, $headers);
