<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Equipments/equipmentEntity.php";

class equipmentView
	{
		public function getData()
		{	
			$equipmentEntity = new equipmentEntity;
			$result = $equipmentEntity -> getData();	
			
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