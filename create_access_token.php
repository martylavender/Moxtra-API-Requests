<?php

// include our auth.inc.php file
require "auth.inc.php";

// auth data we need to send so we can generate an access token
$data = array(
    'org_id' => "$org_id",
    'client_secret'  => "$client_secret",
    'client_id' => "$client_id",
    'email' => "$email"
);

// makes sure that we get a string returned in json format
$data_json = json_encode($data);

// the URL we are making our api request against
$url = '';


// initializes our curl session
$ch = curl_init();

// defines our curl transfer options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// performs our curl session and sets it as a variable
$access_token  = curl_exec($ch);

// closes our curl session
curl_close($ch);

$token = json_decode($access_token, true);
echo $token['access_token'];

?>