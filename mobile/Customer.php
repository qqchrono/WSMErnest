<?php
include ('db.php');
class Customer {
    #get all customer infomation
    public  function fecth_all_customer(){
        
    }
    #get customer detail 
    public function fetch_detail($customer_email){
        global $conn;
        $SQL = "SELECT * FROM customeraccount WHERE email = '$customer_email'";
        $exeSQL = mysqli_query($conn, $SQL);
        $array= mysqli_fetch_assoc($exeSQL);
            return $array;
        
    }
    //get user usage
    public function fetch_usage($customer_id){
        global $conn;
        $SQL = "SELECT * FROM waterusagebill WHERE customerID ='$customer_id'";
        $exeSQL =  mysqli_query($conn, $SQL);
        $array = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);
        return $array ;
    }
    #update user information 
    public function update_detail($phone,$password,$bank,$customer_email){
        global $conn;
        $SQL = "UPDATE customeraccount SET password = '$password' ,bankAccount = '$bank'  ,phoneNumber ='$phone' WHERE email='$customer_email'";
        $exeSQL = mysqli_query($conn,$SQL);
        if ($exeSQL === TRUE){
            return " updated";
        }
        else 
            return "$conn->error";
        
    }

   
}
?>