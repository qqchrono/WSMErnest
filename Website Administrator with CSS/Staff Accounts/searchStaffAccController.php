<?php
require_once 'staffEntity.php';

class searchStaffAcc
	{
		public function searchStaffAcc($inputdata)
		{	
			$staffEntity = new staffEntity;
            $result = $staffEntity -> searchStaffAcc($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>