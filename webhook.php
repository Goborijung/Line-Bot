<?php
$access_token = 'pWTpWUYdUDetDM0PJ2A7QosVJc6Thh8GiJtOYGHKueUswk9KK8NyfRGjOlgjqjv7f3Xc6MAdEYeUpQGXVxTTVzLPS6yIxY/p8fAvjga33ia8cPhhGSkvidD+2X1SdURB4Zg4pIq2oM6jtneCsNpNJAdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input'); //เราสร้างตัวแปรนี้ขึ้นมาเพื่อไว้สำหรับเก็บ Datas ที่เราได้รับมาจาก LINE
$events = json_decode($content, true); //เก็บค่า Array หลังจาก Decode แล้วโดยใช้คำสั่ง json_decode

$arrQuestion = {'null'};

if (!is_null($events['events'])) {
 foreach ($events['events'] as $event) {
  
  //message text
  if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
   $text = $event['message']['text'];
   $replyToken = $event['replyToken'];
   
   if($text == '?'){
    $messages = ['type' => 'text', 'text' => 'ต้องการให้เราช่วยอะไรคับ ?'];
   }else{
    $messages = ['type' => 'text', 'text' => $text];
   }
  }
  
  //message stricker
  if ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {
   $packageId = $event['message']['packageId'];
   $stickerId = $event['message']['stickerId'];
   $replyToken = $event['replyToken'];
  
   $messages = [
    'type' => 'sticker',
    'packageId' => $packageId,
    'stickerId' => $stickerId
   ];
   
  }

   $url = 'https://api.line.me/v2/bot/message/reply';
   $data = [
    'replyToken' => $replyToken,
    'messages' => [$messages]
   ];
   $post = json_encode($data);
   $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   $result = curl_exec($ch);
   curl_close($ch);

   echo $result . "\r\n";
  }
}

?>
