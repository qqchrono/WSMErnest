<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";

class deleteCustomer
	{
		public function deleteCustomer($inputdata)
		{	
			$customerEntity = new customerEntity;
            $result = $customerEntity -> deleteCustomer($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>