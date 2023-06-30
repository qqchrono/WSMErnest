<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Staff Accounts/staffEntity.php";

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