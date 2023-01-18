<?php 

$filename = "access_token.txt";    
$fp = fopen($filename, "r");
$content = fread($fp, filesize($filename));
fclose($fp);

$accessToken = json_decode($content, true)['access_token'];

$authorization = "Authorization: Bearer {$accessToken}";
$storeURL = "https://6dep.zucandu.com";
$appURL = "https://asapheat.com";

try {
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"{$storeURL}/api/v1/app/webhook/create");
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Accept: application/json', $authorization]);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
		'url' => "{$appURL}/receive-webhook-data.php", // URL that receive data from the Zucandu online store
		'event' => "product.created",
	]));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$resp = curl_exec($ch);
	curl_close($ch);

	var_dump(json_decode($resp));
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}



exit;