<?php
include 'ticket.php';
include 'json_encode.php';
$g= new ticket;
$UserId=$decodedData['user_id'];
$detail=$decodedData['detail'];
$type=$decodedData['type'];
//check if type of ticket are support or complaint
if ($type=="Support"){
    $result = $g->create_support_ticket($UserId,$detail);
    $response[] = array("Message" => $result);
    echo json_encode($response);
}
else{
    $result = $g->create_complaint_ticket($UserId,$detail);
    $response[] = array("Message" => $result);
    echo json_encode($response);
}