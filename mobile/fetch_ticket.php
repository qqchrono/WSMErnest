<?php
include 'Ticket.php';
include 'json_encode.php';
$g= new Ticket;
$userid=$decodedData['user_id'];
$result[] = $g->fetch_support_ticket($userid);
$res2[] = $g->fetch_complaint_ticket($userid);
$response= [];
array_push($response,$result,$res2);
echo json_encode($response);    