<?php

// echo "Hello Bot Goborijung";

$strAccessToken = "OyJ4nQPnUj2MIhEdFLugs9MQMDaRyNglNtwIVwJRPhqu+i1ucjxFz+N2aK2T/88Bf3Xc6MAdEYeUpQGXVxTTVzLPS6yIxY/p8fAvjga33iZGAShng8Au+dTdpctQKg+u1QhZ/6eogkV9D0DXfxQELgdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

$_msg = $arrJson['events'][0]['message']['text'];

if ($_msg == "สวัสดี")
	{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ " . $arrJson['events'][0]['source']['userId'];
	}

if ($_msg == "ขอแนวข้อสอบ")
	{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "ต้องขออภัย! ตอนนี้ยังไม่มีแนวข้อสอบนะครับผม :) ";
	}

if ($_msg == "?")
	{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "ครับผม ต้องการให้เราช่วยเหลืออะไรครับ ??? <br> 555+";
	}

if ($_msg == "img")
	{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "image";
	$arrPostData['messages'][0]['originalContentUrl'] = "https://www.ez-miner.com/Img/landing/avatar3.jpg";
	$arrPostData['messages'][0]['previewImageUrl'] = "https://www.ez-miner.com/Img/landing/avatar3.jpg";
	}

if ($_msg == "ตารางสอบ")
	{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "ต้องขออภัย! ตอนนี้ยังไม่มี ตารางสอบนะครับผม :) ";
	}

if ($_msg == "ขอบคุณครับ")
	{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "ครับผม :)";
	}

if ($_msg == "ทำอะไรได้บ้าง")
	{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
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
