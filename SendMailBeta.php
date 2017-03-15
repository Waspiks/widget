<?php
$datamsv = json_decode($HTTP_RAW_POST_DATA, true);
$to = $datamsv[client][email];
$title = "Заказ";
$from = "From: <service@poduschki.ru>";

$message = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
   <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
      <title>Стили</title>
      <link rel=\"stylesheet\" href=\"C:\Users\user\OneDrive\Работа\popup.css\">
   </head>
   <body>
   <table class=\"newsletter\" style=\"background:none !important;border=collapse;mso-tabl...: rgb(255, 255, 255); min-height; 50px; transform: scale(1):\" cellpacing=\"0\" cellpadding=\"30\" align=\"center\" width=\"100%\">
      <tbody><tr><td class=\"content\" style=\"width:600px!important;padding:0;\">
      <div id=\"contentarea\" style=\"width:600px;margin:0 auto; margin: 0px auto; background-image: none; background-color: rgb(255, 255, 255); min-height: 50px; transform: scale(1);\">
         <div class=\"column full preheader_block\">
            <table style=\"border-collapse: collapse; background: none repeat scroll 0% 0% rgb(226, 226, 226);\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#e2e2e2\" border=\"0\" width=\"100%\">
               <tbody>
                  <tr>
                     <td style=\"padding:0px;\">
                        <table class=\"column_table\" style=\"border-collapse: collapse; background: none repeat scroll 0% 0% rgb(226, 226, 226);\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#e2e2e2\" align=\"left\" border=\"0\" width=\"50%\">
                           <tbody>
                              <tr>
                                 <td valign=\"top\" align=\"left\">
                                    <p style=\"margin: 10px 10px 0px; font-size: 12px; border-width: 2px;\">Задайте краткое содержимое письма</p>
                                 </td>
                              </tr>
                           </tbody>
                        </table>

                        <table class=\"column_table\" style=\"border-collapse: collapse; background: none repeat scroll 0% 0% rgb(226, 226, 226);\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#e2e2e2\" align=\"left\" border=\"0\" width=\"50%\">
                           <tbody>
                              <tr>
                                 <td valign=\"top\" align=\"right\">
                                    <p style=\"text-align: right; margin: 10px 10px 0px; font-size: 12px; border-width: 2px;\"><a style=\"border-width: 2px;\" href=\"%%D0%9F%D0%A0%D0%95%D0%92%D0%AC%D0%AE%\" id=\"watch_offline\">Открыть письмо в браузере</a></p>
                                 </td>
                              </tr>
                           </tbody>
                        </table>

                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class=\"column full\">
              <table style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">
                  <tbody>
                     <tr>
                        <td style=\"padding:6px;\">
                           <h1 style=\"font-weight:800;line-height:1.5em;margin:0;padding:10px 0;font-size:26px;text-transform:uppercase;display:block;font-family:Arial, sans-serif;font-style:normal;\">Здравствуйте. Responsive.</h1>
                           <p style=\"font-size:16px;font-style:italic;margin:0;padding:10px 0;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </td>
                     </tr>
               </tbody>
              </table>
          </div>
          <div class=\"column full\">
              <table style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">
               <tbody>
                  <tr>
                     <td style=\"padding:6px;\">
                          <img src=\"http://pics.mlwheel.net/editor/assets/minimalist-basic/o01-1.jpg\" alt=\"\" style=\"width:100%;display:block;\">
                     </td>
                     </tr>
                  </tbody>
              </table>
      </div>
      <div class=\"column full\">
              <table style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">
               <tbody>
                  <tr>
                     <td style=\"padding:6px;\">
                           <p style=\"font-size:13px;padding:10px 0;margin:0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus leo ante, consectetur sit amet vulputate vel, dapibus sit amet lectus.</p>
                        </td>
                     </tr>
                  </tbody>
              </table>
      </div>
      <div class=\"column full\">
         <table style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">
            <tbody>
               <tr>
                  <td style=\"padding:6px;\">
                           <table class=\"column_table\" style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" border=\"0\" width=\"33.3%\">
                              <tbody>
                                 <tr>
                              <td style=\"padding:0 5px\">
                                       <img src=\"http://pics.mlwheel.net/editor/assets/minimalist-basic/k02-1.jpg\" alt=\"\" style=\"width:100%;\"><br>
                                       <h2 style=\"font-size:18px;margin:10px 0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum<br></h2>
                                 <p style=\"font-size:13px;margin:10px 0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </td>
                              </tr>
                           </tbody>
                          </table>
                          <table class=\"column_table\" style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" border=\"0\" width=\"33.3%\">
                           <tbody>
                              <tr>
                              <td style=\"padding:0 5px\">
                                       <img src=\"http://pics.mlwheel.net/editor/assets/minimalist-basic/k02-2.jpg\" alt=\"\" style=\"width:100%;\"><br>
                                       <h2 style=\"font-size:18px;margin:10px 0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum<br></h2>
                                 <p style=\"font-size:13px;margin:10px 0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </td>
                              </tr>
                           </tbody>
                          </table>
                          <table class=\"column_table\" style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" border=\"0\" width=\"33.3%\">
                           <tbody>
                              <tr>
                              <td style=\"padding:0 5px\">
                                       <img src=\"http://pics.mlwheel.net/editor/assets/minimalist-basic/k02-3.jpg\" alt=\"\" style=\"width:100%;\"><br>
                                       <h2 style=\"font-size:18px;margin:10px 0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum<br></h2>
                                 <p style=\"font-size:13px;margin:10px 0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </td>
                              </tr>
                           </tbody>
                          </table>
                  </td>
                  </tr>
              </tbody>
          </table>
      </div>
      <div class=\"column full\">
          <table style=\"border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">
              <tbody>
               <tr>
                      <td style=\"padding:6px;\">
                          <h2 style=\"font-size:22px;font-weight:600;margin:0;padding:10px 0;line-height:1.5em;display:block;font-family:Arial, sans-serif;font-style:normal;\">Heading 2 Text Goes Here</h2>
                       <p style=\"font-size:13px;margin:0;padding:10px 0;line-height:1.5em;font-family:Arial, sans-serif;font-style:normal;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                      </td>
                  </tr>
              </tbody></table>
      </div>";
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

mail("waspiks@live.ru", $title, $message, $headers);