<?php
$access_token = 'OyJ4nQPnUj2MIhEdFLugs9MQMDaRyNglNtwIVwJRPhqu+i1ucjxFz+N2aK2T/88Bf3Xc6MAdEYeUpQGXVxTTVzLPS6yIxY/p8fAvjga33iZGAShng8Au+dTdpctQKg+u1QhZ/6eogkV9D0DXfxQELgdB04t89/1O/w1cDnyilFU=';

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
