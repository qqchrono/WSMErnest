<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Staff Accounts/staffEntity.php";

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