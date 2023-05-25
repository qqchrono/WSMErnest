<?php
require_once 'staffEntity.php';

class addStaff
	{
		public function addStaff($inputdata)
		{	
			$staffEntity = new staffEntity;
            $result = $staffEntity -> addStaff($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>