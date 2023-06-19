<?php
require_once 'customerEntity.php';

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