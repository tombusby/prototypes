#!/usr/bin/env php
<?php

$publicHash = '3441df0babc2a2dda551d7cd39fb235bc4e09cd1e4556bf261bb49188f548348';
$privateHash = 'e249c439ed7697df2a4b045d97d4b9b7e1854c3ff8dd668c779013653913572e';
$content    = json_encode(array(
    'test' => 'content'
));

$hash = hash_hmac('sha256', $content, $privateHash);

$headers = array(
    'X-Public: '.$publicHash,
    'X-Hash: '.$hash
);

$ch = curl_init('http://192.168.88.144/');
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$content);

$result = curl_exec($ch);
curl_close($ch);

echo "RESULT\n======\n".print_r($result, true)."\n\n";
