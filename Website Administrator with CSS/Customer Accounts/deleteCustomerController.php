<?php
require_once 'customerEntity.php';

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