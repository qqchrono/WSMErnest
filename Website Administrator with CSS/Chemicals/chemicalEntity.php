<?php
    require_once '../DatabaseConnection.php';

    class chemicalEntity
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
            $userQuery = "SELECT * FROM chemicals";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getDataForEditForm($inputdata)
        {
            $chemicalID = $inputdata;

            $userQuery = "SELECT * FROM chemicals WHERE `chemicalID` = $chemicalID";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function addChemical($inputdata)
        {   
            $data = "'" .implode ("','",$inputdata) . "'";

            $chemicalQuery = "INSERT INTO `chemicals` (chemicalName, useTime, quantity, expiryDate)
            VALUES ($data)";
            
            $result = $this->conn->query($chemicalQuery);
            
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function editChemical($inputdata)
        {   
            $chemicalID = $inputdata[0];
            $chemicalName = $inputdata[1];
            $useTime = $inputdata[2];
            $quantity = $inputdata[3];
            $expiryDate = $inputdata[4];

            $chemicalQuery = "UPDATE `chemicals` SET `chemicalName` = '$chemicalName', `useTime` = '$useTime',
            `quantity` = '$quantity', `expiryDate` = '$expiryDate'
            WHERE `chemicalID` = '$chemicalID'";
            
            $result = $this->conn->query($chemicalQuery);
            
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function deleteChemical($inputdata)
        {
            $chemicalID = $inputdata;

            $chemicalQuery = "DELETE FROM chemicals WHERE `chemicalID` = $chemicalID";
            $result = $this->conn->query($chemicalQuery);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function searchChemical($inputdata)
        {
            $chemicalName = $inputdata;

            $userQuery = "SELECT * FROM chemicals WHERE `chemicalName` LIKE $chemicalName";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }
    }

?>