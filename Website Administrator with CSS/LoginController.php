<?php
	#$path = $_SERVER['DOCUMENT_ROOT'];
	#$path .= "/Water-Supply-Management/Website Administrator with CSS//Staff Accounts/staffEntity.php";
	#include_once($path);
    #include 'E:/xampp/htdocs/Water-Supply-Management/Website Administrator with CSS/Staff Accounts/staffEntity.php';
	require_once 'Staff Accounts/staffEntity.php';
    
    class Login 
	{
		public function checkAccount($inputdata)
		{	
			$staffEntity = new staffEntity;
			$result = $staffEntity -> checkAccount($inputdata);	
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}
?>