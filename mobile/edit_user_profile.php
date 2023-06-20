<?php
include 'Customer.php';
include 'json_encode.php';
$UserEmail =$decodedData['Email'];
$phone= $decodedData['Phone'];
$password=$decodedData['password'];
$bank = $decodedData['Bank'];

$g = new customer;
$result =  $g->update_detail($phone,$password,$bank,$UserEmail);
$response[] = array("Message" => $result);
echo json_encode($response);