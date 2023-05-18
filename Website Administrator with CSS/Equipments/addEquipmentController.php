<?php
require_once 'equipmentEntity.php';

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