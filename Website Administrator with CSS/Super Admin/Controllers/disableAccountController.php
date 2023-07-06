<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Super Admin/superAdminEntity.php";

class disableAccount
	{
		public function disableAccount($companyUEN)
		{	
            echo 'Hi controller';
			$superAdmin = new superAdminEntity;
			$result = $superAdmin -> disableAccount($companyUEN);	
			
			if($result)
            {
				return true;
			}
			else
            {
				return false;
			}
		}		
	}

?>