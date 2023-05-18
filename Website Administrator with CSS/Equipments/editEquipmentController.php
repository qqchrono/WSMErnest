<?php
require_once 'equipmentEntity.php';

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