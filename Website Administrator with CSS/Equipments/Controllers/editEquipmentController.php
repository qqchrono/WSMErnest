<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Equipments/equipmentEntity.php";

class editEquipment 
	{
		public function editEquipment($inputdata)
		{	
			$equipmentEntity = new equipmentEntity;
            $result = $equipmentEntity -> editEquipment($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	

		public function getDataForEditForm($inputdata)
		{	
			$equipmentEntity = new equipmentEntity;
            $result = $equipmentEntity -> getDataForEditForm($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}
	}

?>