<?php
include 'Customer.php';
include 'json_encode.php';
$g= new Customer;
$UserId =$decodedData['user_id'];
$response = $g->fetch_usage($UserId);
echo json_encode($response);