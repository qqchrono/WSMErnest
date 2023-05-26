<?php
require_once 'customerEntity.php';

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