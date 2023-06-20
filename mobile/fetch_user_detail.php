<?php
include 'Customer.php';
include 'json_encode.php';
$g= new Customer;
$UserEmail =$decodedData['Email'];
$response[] = $g->fetch_detail($UserEmail);
echo json_encode($response);