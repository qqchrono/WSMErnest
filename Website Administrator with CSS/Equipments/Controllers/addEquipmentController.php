<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Equipments/equipmentEntity.php";

class addEquipment 
	{
		public function addEquipment($inputdata)
		{	
			$equipmentEntity = new equipmentEntity;
            $result = $equipmentEntity -> addEquipment($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>