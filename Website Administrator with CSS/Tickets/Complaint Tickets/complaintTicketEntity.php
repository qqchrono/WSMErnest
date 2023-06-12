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

        public function getDataForEditForm($inputdata)
        {
            $staffID = $inputdata;

            $userQuery = "SELECT * FROM staffAccount WHERE `staffID` = $staffID";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function addStaff($inputdata)
        {   
            $data = "'" .implode ("','",$inputdata) . "'";

            $staffQuery = "INSERT INTO `staffAccount` (staffName, email, password, role)
            VALUES ($data)";
            
            $result = $this->conn->query($staffQuery);
            
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function editStaff($inputdata)
        {   
            $staffID = $inputdata[0];
            $staffName = $inputdata[1];
            $email = $inputdata[2];
            $password = $inputdata[3];
            $role = $inputdata[4];

            $staffQuery = "UPDATE `staffAccount` SET `staffName` = '$staffName', `email` = '$email',
            `password` = '$password', `role` = '$role'
            WHERE `staffID` = '$staffID'";
            
            $result = $this->conn->query($staffQuery);
            
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function deleteStaff($inputdata)
        {
            $staffID = $inputdata;

            $staffQuery = "DELETE FROM staffAccount WHERE `staffID` = $staffID";
            $result = $this->conn->query($staffQuery);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

?>