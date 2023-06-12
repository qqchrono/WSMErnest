<?php
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