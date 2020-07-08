<?php
$token = $_POST['value'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v7.0/me/adaccounts?fields=account_status,account_id&access_token='.$token.'');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Host: graph.facebook.com';
$headers[] = 'Origin: https://business.facebook.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 8.0.0; Motorola Moto X Build/OPR6.170623.017; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/58.0.3029.125 Mobile Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = json_decode(curl_exec($ch),true);
curl_close ($ch);
// print_r($result);
foreach ($result['data'] as $adaccount){
	if ($adaccount['account_status']=='1'){
		$response[]=$adaccount['account_id'];
	}
	
}
echo json_encode($response);
