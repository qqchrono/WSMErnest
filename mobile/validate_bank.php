<?php
include ('db.php');
include 'json_encode.php';
include 'Customer.php';
$g= new Customer;

$amount = $decodedData['total_price'];
$bankaccount= $decodedData['bankAccount'];
$waterusageid= $decodedData['billid'];

$SQL = "SELECT * FROM bankaccount WHERE AccountNumber = '$bankaccount'";
$exeSQL = mysqli_query($conn, $SQL);
$result= mysqli_fetch_assoc($exeSQL);

if($result!=0){
    if($result['Balance']>=$amount){
        $update_amount= floatval($result['Balance'])-$amount;
        $SQL = "UPDATE bankaccount SET Balance = '$update_amount' WHERE AccountNumber='$bankaccount'";
        $exe = mysqli_query($conn,$SQL);
        if ($exe === TRUE){
            $Message ="Payment Completed";
            $g->update_bill($waterusageid);
        }
        else{ 
            $Message= "smt";
        }
    }
    else{
        $Message="Insufficient Amount to deduct";
    }
}
else{
    $Message="Bank Account is invalid";
}

echo json_encode($Message);

?>