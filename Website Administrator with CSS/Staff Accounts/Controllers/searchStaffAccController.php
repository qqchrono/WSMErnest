<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Staff Accounts/staffEntity.php";

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