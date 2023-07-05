<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/Water-Supply-Management/Website Administrator with CSS/DatabaseConnection.php";
	include_once ($path);
    
    class superAdminEntity
    {
        private $conn;
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }
    
        public function __destruct()
        {
    
        }

        public function viewCompanyAdmins()
        {            
            $userQuery = "SELECT staffID, StaffAccount.companyUEN, companyName, staffName, email, password, 
            companyAccountStatus, companyPaymentStatus, companySubscriptionType, companyTrialStatus, companyExpiryDate
            FROM StaffAccount
            INNER JOIN CompanyDetails ON StaffAccount.companyUEN = CompanyDetails.companyUEN
            WHERE role = 'Admin'";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function disableAccount($companyUEN)
        {
            $userQuery = "UPDATE `CompanyDetails` SET `companyAccountStatus` = 0
            WHERE `companyUEN` = $companyUEN";

            $result = $this->conn->query($userQuery);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function enableAccount($companyUEN)
        {
            $userQuery = "UPDATE `CompanyDetails` SET `companyAccountStatus` = 1
            WHERE `companyUEN` = $companyUEN";

            $result = $this->conn->query($userQuery);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function searchStaffAcc($inputdata)
        {
            $searchTerm  = $inputdata;

            $userQuery = "SELECT * FROM staffAccount WHERE `staffName` LIKE '%$searchTerm%'";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getSearchData()
        {
            $userQuery = "SELECT * FROM staffAccount";
            $result = $this->conn->query($userQuery);
            if($result->num_rows>0) {
                return $result;
            }else{
                return false;
            }
        }
        
    }

?>