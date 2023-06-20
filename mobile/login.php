<?php
include 'Customer.php';
include 'json_encode.php';
$g= new Customer;
$UserEmail =$decodedData['Email'];
$UserPW = ($decodedData['Password']); //password is hashed

if($g->fetch_detail($UserEmail)!=0){
    $array= $g->fetch_detail($UserEmail);
    if ($array['password'] != $UserPW) {
        $Message = "pw WRONG";
    } else {
        $Message = "Success";
    }
}
else {
    $Message = "No account yet";
}


$response[] = array("Message" => $Message);
echo json_encode($response);