<?php

include('auth.inc.php');
include('get_binders.php');

// for debugging
// var_dump($token);

$message_text = "This is a new message"; // this should be populated from external system e.g., ticket update information

$data = [
    'text' => $message_text
 ];


// turns on php output buffer for debugging
// ob_start();  
// $out = fopen('php://output', 'w');

$data_json = json_encode($data);
$api_url = ''.$moxtra_url.'/v1/'.$binder_id.'/comments?access_token='.$token['access_token'].'';

$ch = curl_init();

// for debugging
// curl_setopt($ch, CURLOPT_VERBOSE, true);  
// curl_setopt($ch, CURLOPT_STDERR, $out);  


// normal curl options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$binder_data  = curl_exec($ch);

// closes stream and grabs information from output
// fclose($out);  
// $debug = ob_get_clean();

curl_close($ch);
//print_r ($binder_data);

// prints debug information
//print_r ($debug);

?>