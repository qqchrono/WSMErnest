<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Equipments/equipmentEntity.php";

class equipmentView
	{
		public function getData($companyUEN)
		{	
			$equipmentEntity = new equipmentEntity;
			$result = $equipmentEntity -> getData($companyUEN);	
			
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