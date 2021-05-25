<?php

include('create_access_token.php');
include('auth.inc.php');

// for debugging
// var_dump($token);

$tag_value = "Ticket1"; // this should be populated by the external system i.e., ticket name

$api_url = ''.$moxtra_url.'/v1/'.$org_id.'/users/'.$email.'/binders?access_token='.$token['access_token'].'&filter=binder&is_email=true&tags_include='.$tag_value.'';

$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data, true);

$binder_id = $response_data['data']['binders'][0]['binder']['id'];

// var_dump($binder_id);

?>