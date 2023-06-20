<?php
include ('db.php');
class ticket{
    //create support ticket
    public function create_support_ticket($customer_id,$detail){
        global $conn;
        $SQL = "INSERT INTO `supportticket` (`customerID`,`details`) VALUES ('$customer_id','$detail')";
        $exeSQL = mysqli_query($conn,$SQL);
        if($exeSQL ===TRUE){
            return "Submited";
        }
        else return "$conn->error";
    }
    //create complain ticket
    public function create_complaint_ticket($customer_id,$detail){
        global $conn;
        $SQL = "INSERT INTO `complaintticket` (`customerID`,`details`) VALUES ('$customer_id','$detail')";
        $exeSQL = mysqli_query($conn,$SQL);
        if($exeSQL ===TRUE){
            return "Submited";
        }
        else return "$conn->error";
    }
    public function fetch_support_ticket($customer_id){
        global $conn;
        $SQL = "SELECT * FROM `supportticket` WHERE customerID = '$customer_id'";
        $exeSQL = mysqli_query($conn, $SQL);
        $array = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);
            return $array;
    }
    public function fetch_complaint_ticket($customer_id){
        global $conn;
        $SQL = "SELECT * FROM `complaintticket` WHERE customerID = '$customer_id'";
        $exeSQL = mysqli_query($conn, $SQL);
        $array = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);
            return $array;
    }
}
?>