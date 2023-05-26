<?php
require_once 'customerEntity.php';

class customerView
	{
		public function getData()
		{	
			$customerEntity = new customerEntity;
			$result = $customerEntity -> getData();	
			
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