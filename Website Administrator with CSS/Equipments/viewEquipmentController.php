<?php
require_once 'equipmentEntity.php';

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