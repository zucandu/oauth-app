<?php 

// Replace client id/secret
$clientId = "thLhaQQ1cBSkSYD23SSSRnnRPUugG8GiChWkcoaZW4001m3S";
$clientSecret = "jt2umPyz1LrwSFIcfGd08v6s1FrMUdYBR7XhCUfTEUlIU0A1";

// Store URL
$storeURL = $_REQUEST['store_url'];

// Verify the signature to avoid spam your app server
$payload = base64_encode(json_encode(['code' => $_REQUEST['code'], 'store_url' => $storeURL]));
$hmac = hash_hmac('sha256', $payload, $clientSecret);
if($_REQUEST['hmac'] != $hmac) {
	echo "Invalid signature";
	return false;
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://{$storeURL}/api/v1/oauth/token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
	'grant_type' => 'authorization_code',
	'client_id' => $clientId,
	'client_secret' => $clientSecret,
	'code' => $_REQUEST['code'],
]));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

curl_close($ch);

// Save the access token with file
$fp = fopen('access_token.txt', 'w');
fwrite($fp, $resp);
fclose($fp);

// You should redirect to your app dashboard when you have the access token
echo "Completed!"; exit;