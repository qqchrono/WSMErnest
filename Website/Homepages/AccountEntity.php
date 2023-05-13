<?php
require_once 'DatabaseConnection.php';
class AccountEntity
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    public function create($inputdata)
    {
        $data = "'" .implode ("','",$inputdata) . "'";

        $accountQuery = "INSERT INTO userAccount (name, surname, phone, email,
        type, role, password,status) VALUES ($data)";
        $result = $this->conn->query($accountQuery);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function getData()
    {
        $userQuery = "SELECT * FROM useraccount";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function searchData($inputdata)
    {
        $userQuery = "SELECT * FROM `useraccount` WHERE CONCAT(name, surname, phone, type, status) LIKE '%".$inputdata."%'";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    
    public function checkAccount($inputdata)
    {  
        $username = $inputdata[0];
        $password = $inputdata[1];

        $selectAccount = "SELECT * FROM `useraccount` WHERE (`name` = '$username' AND `password` = '$password')";
        $result = $this->conn->query($selectAccount);

        while($row = mysqli_fetch_array($result))
        {
            return $row['role'];
        }

    }
    
    public function modify($inputdata)
    {   
        $userID = $inputdata[0];
        $name = $inputdata[1];
        $surname = $inputdata[2];
        $phone = $inputdata[3];
        $email = $inputdata[4];
        $type = $inputdata[5];
        $role = $inputdata[6];
        $password = $inputdata[7];

        $accountQuery = "UPDATE `useraccount` SET `name` = '$name', `surname` = '$surname', `phone` = '$phone', `email` = '$email',
        `type` = '$type', `role` = '$role', `password` = '$password'
        WHERE `userID` = '$userID'
        ";
        
        $result = $this->conn->query($accountQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }

    public function suspendAccount($userID)
    {   

        $suspendQuery = "UPDATE `useraccount` SET `status` = 'Suspended' WHERE `userID` = '$userID'";
        
        $result = $this->conn->query($suspendQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }

    
    public function suspendProfile($userID)
    {   

        $suspendQuery = "UPDATE `useraccount` SET `role` = 'Suspended' WHERE `userID` = '$userID'";
        
        $result = $this->conn->query($suspendQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }
    

    public function revertAccount($userID)
    {   

        $revertQuery = "UPDATE `useraccount` SET `status` = 'Active' WHERE `userID` = '$userID'";
        
        $result = $this->conn->query($revertQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }

    public function revertProfile($userID)
    {   

        $revertQuery = "UPDATE `useraccount` SET `role` = '' WHERE `userID` = '$userID'";
        
        $result = $this->conn->query($revertQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }
}
?>