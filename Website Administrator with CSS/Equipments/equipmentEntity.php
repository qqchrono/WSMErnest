<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/Water-Supply-Management/Website Administrator with CSS/DatabaseConnection.php";
    include_once ($path);

    class equipmentEntity
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
            $userQuery = "SELECT * FROM equipments";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getDataForEditForm($inputdata)
        {
            $equipmentID = $inputdata;

            $userQuery = "SELECT * FROM equipments WHERE `equipmentID` = $equipmentID";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function addEquipment($inputdata)
        {   
            $data = "'" .implode ("','",$inputdata) . "'";

            $equipmentQuery = "INSERT INTO `equipments` (equipmentName, quantity, installationDate, expiryDate, warrantyDate)
            VALUES ($data)";
            
            $result = $this->conn->query($equipmentQuery);
            
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function editEquipment($inputdata)
        {   
            $equipmentID = $inputdata[0];
            $equipmentName = $inputdata[1];
            $quantity = $inputdata[2];
            $installationDate = $inputdata[3];
            $expiryDate = $inputdata[4];
            $warrantyDate = $inputdata[5];

            $equipmentQuery = "UPDATE `equipments` SET `equipmentName` = '$equipmentName', `quantity` = '$quantity',
            `installationDate` = '$installationDate', `expiryDate` = '$expiryDate', `warrantyDate` = '$warrantyDate'
            WHERE `equipmentID` = '$equipmentID'";
            
            $result = $this->conn->query($equipmentQuery);
            
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function deleteEquipment($inputdata)
        {
            $equipmentID = $inputdata;

            $equipmentQuery = "DELETE FROM equipments WHERE `equipmentID` = $equipmentID";
            $result = $this->conn->query($equipmentQuery);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function searchEquipment($inputdata)
        {
            $searchTerm  = $inputdata;

            $userQuery = "SELECT * FROM equipments WHERE `equipmentName` LIKE '%$searchTerm%'";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getSearchData()
        {
            $userQuery = "SELECT * FROM equipments";
            $result = $this->conn->query($userQuery);
            if($result->num_rows>0) {
                return $result;
            }else{
                return false;
            }
        }
    }

?>