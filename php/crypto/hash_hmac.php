#!/usr/bin/env php
<?php

$key = mt_rand();
$docId = 'co/06731771/41';
$userId = '12345678-9012-3456-7890-123456789012';
$expires = date('U');

echo $key . "\n\n";
echo $docId . "\n";
echo $userId . "\n";
echo $expires . "\n\n";

$hash = hash_hmac("sha256", implode(":", [$docId, $userId, $expires]), $key);

print $hash . "\n";
