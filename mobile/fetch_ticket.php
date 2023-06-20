<?php
include 'Ticket.php';
include 'json_encode.php';
$g= new Ticket;
//$userid=$decodedData['userid'];
$result[] = $g->fetch_support_ticket("2");
$res2[] = $g->fetch_complaint_ticket("2");
$response= [];
array_push($response,$result,$res2);
echo json_encode($response);    