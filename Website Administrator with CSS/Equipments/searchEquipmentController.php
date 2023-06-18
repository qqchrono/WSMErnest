<?php
require_once 'equipmentEntity.php';

class searchEquipment
	{
		public function searchEquipment($inputdata)
		{	
			$equipmentEntity = new equipmentEntity;
            $result = $equipmentEntity -> searchEquipment($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>