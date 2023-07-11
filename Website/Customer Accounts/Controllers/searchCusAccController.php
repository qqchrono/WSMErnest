<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";

class searchCusAcc
	{
		public function searchCusAcc($inputdata)
		{	
			$customerEntity = new customerEntity;
            $result = $customerEntity -> searchCusAcc($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>