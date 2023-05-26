<?php
    require_once '../DatabaseConnection.php';

    class customerEntity
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
            $userQuery = "SELECT * FROM CustomerAccount";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getDataForEditForm($inputdata)
        {
            $customerID = $inputdata;

            $userQuery = "SELECT * FROM CustomerAccount WHERE `customerID` = $customerID";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function addCustomer($inputdata)
        {   
            $data = "'" .implode ("','",$inputdata) . "'";

            $customerQuery = "INSERT INTO `CustomerAccount` (customerName, email, password, role)
            VALUES ($data)";
            
            $result = $this->conn->query($customerQuery);
            
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function editCustomer($inputdata)
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

        public function deleteCustomer($inputdata)
        {
            $customerID = $inputdata;

            $customerQuery = "DELETE FROM CustomerAccount WHERE `customerID` = $customerID";
            $result = $this->conn->query($customerQuery);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

?>