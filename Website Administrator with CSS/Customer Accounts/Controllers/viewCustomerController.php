<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";

class customerView
	{
		public function getData()
		{	
			$customerEntity = new customerEntity;
			$result = $customerEntity -> getData();	
			
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