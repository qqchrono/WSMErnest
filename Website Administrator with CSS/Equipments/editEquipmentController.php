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
	}

?>