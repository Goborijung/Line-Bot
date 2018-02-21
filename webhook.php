<?php
$access_token = 'OyJ4nQPnUj2MIhEdFLugs9MQMDaRyNglNtwIVwJRPhqu+i1ucjxFz+N2aK2T/88Bf3Xc6MAdEYeUpQGXVxTTVzLPS6yIxY/p8fAvjga33iZGAShng8Au+dTdpctQKg+u1QhZ/6eogkV9D0DXfxQELgdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
$events = json_decode($content, true);
if (!is_null($events['events'])) {
 foreach ($events['events'] as $event) {
  if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
   $text = $event['message']['text'];
   $replyToken = $event['replyToken'];
    
   $messages = [
     'type' => 'text',
     'text' => 1234;
   ];
   
  }
  
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
    'messages' => [$messages],
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
echo "OK";
?>
