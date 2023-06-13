<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/Water-Supply-Management/Website Administrator with CSS/DatabaseConnection.php";
	require_once($path);

    class complaintTicketEntity
    {
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }
    
        public function __destruct()
        {
    
        }

        public function getData()
        {
            $userQuery = "SELECT * FROM ComplaintTicket 
            INNER JOIN CustomerAccount ON ComplaintTicket.customerID=CustomerAccount.customerID
            LEFT JOIN StaffAccount ON ComplaintTicket.staffID=StaffAccount.staffID";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getDataForStaff($inputdata)
        {
            $userQuery = "SELECT * FROM ComplaintTicket 
            INNER JOIN CustomerAccount ON ComplaintTicket.customerID=CustomerAccount.customerID
            LEFT JOIN StaffAccount ON ComplaintTicket.staffID=StaffAccount.staffID
            WHERE ComplaintTicket.staffID = $inputdata";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function viewTicketDetails($inputdata)
        {
            $complaintTicketID = $inputdata;

            $userQuery = "SELECT * FROM ComplaintTicket
            INNER JOIN CustomerAccount ON ComplaintTicket.customerID=CustomerAccount.customerID
            LEFT JOIN StaffAccount ON ComplaintTicket.staffID=StaffAccount.staffID
            WHERE `complaintTicketID` = $complaintTicketID";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function assignTicket($inputdata)
        {
            $complaintTicketID = $inputdata[0];
            $staffID = $inputdata[1];

            $query = "UPDATE `complaintTicket` SET `staffID` = '$staffID'
            WHERE `complaintTicketID` = '$complaintTicketID'";     
            
            $result = $this->conn->query($query);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function resolveTicket($inputdata)
        {
            $query = "UPDATE `complaintTicket` SET `ticketStatus` = 1
            WHERE `complaintTicketID` = '$inputdata'";     
            
            $result = $this->conn->query($query);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

?>