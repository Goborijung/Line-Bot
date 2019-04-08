<?php
$access_token = 'pWTpWUYdUDetDM0PJ2A7QosVJc6Thh8GiJtOYGHKueUswk9KK8NyfRGjOlgjqjv7f3Xc6MAdEYeUpQGXVxTTVzLPS6yIxY/p8fAvjga33ia8cPhhGSkvidD+2X1SdURB4Zg4pIq2oM6jtneCsNpNJAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
