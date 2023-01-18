<?php 

/**
 * Get the store information with the access token
 *  
 */

$filename = "access_token.txt";    
$fp = fopen($filename, "r");
$content = fread($fp, filesize($filename));
fclose($fp);

$accessToken = json_decode($content, true)['access_token'];

$authorization = "Authorization: Bearer {$accessToken}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://6dep.zucandu.com/api/v1/app/store-owner");
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json' , $authorization]);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resp = curl_exec($ch);
curl_close($ch);

var_dump(json_decode($resp));

exit;