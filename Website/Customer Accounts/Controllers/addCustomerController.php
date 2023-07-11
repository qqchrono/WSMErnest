<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";

class addCustomer
	{
		public function addCustomer($inputdata)
		{	
			$customerEntity = new customerEntity;
            $result = $customerEntity -> addCustomer($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>