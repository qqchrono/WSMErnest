<?php
require_once 'equipmentEntity.php';

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