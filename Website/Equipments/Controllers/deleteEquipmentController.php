<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Equipments/equipmentEntity.php";

class deleteEquipment 
	{
		public function deleteEquipment($inputdata)
		{	
			$equipmentEntity = new equipmentEntity;
            $result = $equipmentEntity -> deleteEquipment($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>