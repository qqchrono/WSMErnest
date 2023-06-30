<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";
class viewBill
	{
		public function viewBill($customerID)
		{	
			$customerEntity = new customerEntity;
			$result = $customerEntity -> viewBill($customerID);	
			
			if($result)
            {
				return $result;
			}
			else
            {
				return false;
			}
		}	
	}

?>