<?php
include 'Customer.php';
include 'json_encode.php';
$g= new Customer;
$email=$decodedData['Email'];
$result = $g->reset_password($email);
    $response[] = array("Message" => $result);
    echo json_encode($response);
