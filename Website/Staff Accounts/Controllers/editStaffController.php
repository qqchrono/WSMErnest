<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Staff Accounts/staffEntity.php";

class editStaff
	{
		public function editStaff($inputdata)
		{	
			$staffEntity = new staffEntity;
            $result = $staffEntity -> editStaff($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	

		public function getDataForEditForm($inputdata)
		{	
			$staffEntity = new staffEntity;
            $result = $staffEntity -> getDataForEditForm($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}
	}

?>