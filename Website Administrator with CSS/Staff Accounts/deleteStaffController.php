<?php
require_once 'staffEntity.php';

class deleteStaff
	{
		public function deleteStaff($inputdata)
		{	
			$staffEntity = new staffEntity;
            $result = $staffEntity -> deleteStaff($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>