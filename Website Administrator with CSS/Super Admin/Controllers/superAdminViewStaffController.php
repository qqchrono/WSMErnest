<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Super Admin/superAdminEntity.php";

class viewCompanyAdmins
	{
		public function viewCompanyAdmins()
		{	
			$superAdmin = new superAdminEntity;
			$result = $superAdmin -> viewCompanyAdmins();	
			
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