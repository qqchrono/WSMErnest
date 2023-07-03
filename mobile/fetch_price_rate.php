<?php
include 'Customer.php';
include 'json_encode.php';
$g= new Customer;
$response = $g->fetch_price_rate();
echo json_encode($response);