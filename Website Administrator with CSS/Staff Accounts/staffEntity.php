<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/Water-Supply-Management/Website Administrator with CSS/DatabaseConnection.php";
	include_once ($path);
    
    class staffEntity
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

		public function checkAccount($inputdata)
		{
			$username = $inputdata["user"];
			$password = $inputdata["pass"];

			$userQuery = "SELECT * FROM staffAccount 
            INNER JOIN CompanyDetails ON StaffAccount.companyUEN = CompanyDetails.companyUEN
            WHERE `username` = '$username' AND `password` = '$password'";
			$result = $this->conn->query($userQuery);

			if ($result && $result->num_rows > 0) {
				return $result; 
			}

			return null; 
		}

        public function getData($companyUEN)
        {
            $userQuery = "SELECT * FROM StaffAccount
            INNER JOIN CompanyDetails ON StaffAccount.companyUEN = CompanyDetails.companyUEN
            WHERE StaffAccount.companyUEN = '$companyUEN'";
            ;
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getDataForAssignTicket()
        {
            $userQuery = "SELECT * FROM StaffAccount WHERE `role` = 'Staff'";
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

            $staffQuery = "INSERT INTO `staffAccount` (username, staffName, email, password, role)
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
            $username = $inputdata[1];
            $staffName = $inputdata[2];
            $email = $inputdata[3];
            $password = $inputdata[4];
            $role = $inputdata[5];

            $staffQuery = "UPDATE `staffAccount` SET `username` = '$username', `staffName` = '$staffName', `email` = '$email',
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

        public function editOwnAccount($inputdata)
		{
			$staffID = $inputdata["staffID"];
			$staffName = $inputdata["staffName"];
			$email = $inputdata["email"];
			$password = $inputdata["password"];
			$role = $inputdata["role"];
			$new_img_name = $inputdata["new_img_name"];

			$staffQuery = "UPDATE `staffAccount` SET `staffName` = '$staffName', `email` = '$email', `password` = '$password', `role` = '$role', `imageName` = '$new_img_name' WHERE `staffID` = '$staffID'";

			$result = $this->conn->query($staffQuery);

			if ($result) {
				return true;
			} else {
				return false;
			}
		}

        function retrieveDataFromDatabase($staffID) {    
            $stmt = $this->conn->prepare("SELECT staffID, staffName, email, password, role, imageName FROM staffAccount WHERE staffID = ?");
            $stmt->bind_param("i", $staffID);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            $stmt->close();
    
            return $result;
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