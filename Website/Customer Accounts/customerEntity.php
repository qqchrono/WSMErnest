<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/Water-Supply-Management/Website Administrator with CSS/DatabaseConnection.php";
	include_once ($path);

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

        public function getData($companyUEN)
        {
            $userQuery = "SELECT * FROM CustomerAccount
            INNER JOIN CompanyDetails ON CustomerAccount.companyUEN = CompanyDetails.companyUEN
            WHERE CustomerAccount.companyUEN = '$companyUEN'";
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
            $customerQuery = "INSERT INTO `CustomerAccount` (customerName, email, address, password, phoneNumber, bankAccount)
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
            $customerID = $inputdata[0];
            $customerName = $inputdata[1];
            $email = $inputdata[2];
            $address = $inputdata[3];
            $password = $inputdata[4];
            $phoneNumber = $inputdata[5];
            $bankNumber = $inputdata[6];

            $staffQuery = "UPDATE `CustomerAccount` SET `customerName` = '$customerName', `email` = '$email',
            `address` = '$address', `password` = '$password', `phoneNumber` = '$phoneNumber', `bankAccount` = '$bankNumber'
            WHERE `customerID` = '$customerID'";
            
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

        public function getWaterPrice()
        {
            $userQuery = "SELECT * FROM priceRate";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function changeWaterPrice($inputdata)
        {
            $priceID = $inputdata[0];
            $priceDate = $inputdata[1];
            $waterPriceRate = $inputdata[2];

            $userQuery = "UPDATE `priceRate` SET `priceDate` = '$priceDate', `waterPriceRate` = '$waterPriceRate'
            WHERE `priceID` = '$priceID'";
            $result = $this->conn->query($userQuery);
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function viewBill($customerID) #need to figure out where to update the bill amount
        {
            $userQuery = "SELECT * FROM WaterUsageBill
            LEFT JOIN CustomerAccount ON WaterUsageBill.customerID=CustomerAccount.customerID
            WHERE WaterUsageBill.customerID = $customerID";

            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function searchCusAcc($inputdata)
        {
            $searchTerm  = $inputdata;

            $userQuery = "SELECT * FROM CustomerAccount WHERE `customerName` LIKE '%$searchTerm%'";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getSearchData()
        {
            $userQuery = "SELECT * FROM CustomerAccount";
            $result = $this->conn->query($userQuery);
            if($result->num_rows>0) {
                return $result;
            }else{
                return false;
            }
        }
    }

?>