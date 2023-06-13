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

		public function getDataForAssignTicket()
		{	
			$staffEntity = new staffEntity;
			$result = $staffEntity -> getDataForAssignTicket();	
			
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