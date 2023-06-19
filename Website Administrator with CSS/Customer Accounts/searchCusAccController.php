<?php
require_once 'customerEntity.php';

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