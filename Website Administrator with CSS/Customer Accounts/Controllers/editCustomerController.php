<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";

class editCustomer
	{
		public function editCustomer($inputdata)
		{	
			$customerEntity = new customerEntity;
            $result = $customerEntity -> editCustomer($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	

		public function getDataForEditForm($inputdata)
		{	
			$customerEntity = new customerEntity;
            $result = $customerEntity -> getDataForEditForm($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}
	}

?>