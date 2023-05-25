<?php
require_once 'staffEntity.php';

class staffView
	{
		public function getData()
		{	
			$staffEntity = new staffEntity;
			$result = $staffEntity -> getData();	
			
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