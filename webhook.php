<?php

// echo "Hello Bot Goborijung";

$strAccessToken = "OyJ4nQPnUj2MIhEdFLugs9MQMDaRyNglNtwIVwJRPhqu+i1ucjxFz+N2aK2T/88Bf3Xc6MAdEYeUpQGXVxTTVzLPS6yIxY/p8fAvjga33iZGAShng8Au+dTdpctQKg+u1QhZ/6eogkV9D0DXfxQELgdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

// Text or Message Onliy

$_msg = $arrJson['events'][0]['message']['text']; //request api
$arrPostData = array(); //response api
$_replyToken = $arrJson['events'][0]['replyToken'];
$_replyText = $arrPostData['messages'][0]['type'] = "text";
$_postData = $arrPostData['messages'][0]['text'];
switch ($_msg)
	{
case "555":
	$arrPostData['replyToken'] = $_replyToken;
	$_replyText;
	$_postData = "666";
	break;

case "สวัสดี":
	$arrPostData['replyToken'] = $_replyToken;
	$_replyText;
	$_postData = "สวัสดี ID คุณคือ " . $arrJson['events'][0]['source']['userId'];
	break;

case "ชื่ออะไร":
	$arrPostData['replyToken'] = $_replyToken;
	$_replyText;
	$_postData = "ฉันยังไม่มีชื่อนะ";
	break;

case "ทำอะไรได้บ้าง":
	$arrPostData['replyToken'] = $_replyToken;
	$_replyText;
	$_postData = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
	break;

default:
	$arrPostData['replyToken'] = $_replyToken;
	$_replyText;
	$_postData = "ฉันไม่เข้าใจคำสั่ง";
	break;
	}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
?>
