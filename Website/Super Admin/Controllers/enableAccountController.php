<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Super Admin/superAdminEntity.php";

class enableAccount
	{
		public function enableAccount($companyUEN)
		{	
            echo 'Hi controller';
			$superAdmin = new superAdminEntity;
			$result = $superAdmin -> enableAccount($companyUEN);	
			
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