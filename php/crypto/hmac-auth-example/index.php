<?php

require_once 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->post('/', function() use ($app) {

	function lookup_private_hash($publicHash) {
		// In a real implementation this would be a database call or something similar
		$lookupMap = [
			'3441df0babc2a2dda551d7cd39fb235bc4e09cd1e4556bf261bb49188f548348'
				=> 'e249c439ed7697df2a4b045d97d4b9b7e1854c3ff8dd668c779013653913572e',
		];
		return in_array($publicHash, array_keys($lookupMap)) ? $lookupMap[$publicHash] : false;
	}

    $request = $app->request();

    $publicHash  = $request->headers('X-Public');
    $contentHash = $request->headers('X-Hash');
    $privateHash = lookup_private_hash($publicHash);
    $content     = $request->getBody();

    if ($privateHash === false) {
    	echo "No private hash found for $publicHash";
    	return;
    }

    $hash = hash_hmac('sha256', $content, $privateHash);

    if ($hash == $contentHash){
        echo "match!\n";
    } else {
    	echo "no match!\n";
    }

});
$app->run();
