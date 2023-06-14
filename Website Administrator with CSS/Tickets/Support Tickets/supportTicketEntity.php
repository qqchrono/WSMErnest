<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/Water-Supply-Management/Website Administrator with CSS/DatabaseConnection.php";
	require_once($path);

    class supportTicketEntity
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
            $userQuery = "SELECT * FROM SupportTicket 
            INNER JOIN CustomerAccount ON SupportTicket.customerID=CustomerAccount.customerID
            LEFT JOIN StaffAccount ON SupportTicket.staffID=StaffAccount.staffID";

            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function viewTicketDetails($inputdata)
        {
            $userQuery = "SELECT * FROM SupportTicket
            INNER JOIN CustomerAccount ON SupportTicket.customerID=CustomerAccount.customerID
            LEFT JOIN StaffAccount ON SupportTicket.staffID=StaffAccount.staffID
            WHERE `supportTicketID` = $inputdata";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function resolveTicket($inputdata)
        {
            $supportTicketID = $inputdata[0];
            $staffID = $inputdata[1];

            $query = "UPDATE `SupportTicket` SET `ticketStatus` = 1, `staffID` = '$staffID'
            WHERE `supportTicketID` = '$supportTicketID'";     
            
            $result = $this->conn->query($query);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

?>