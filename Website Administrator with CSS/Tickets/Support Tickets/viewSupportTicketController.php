<?php
require_once 'supportTicketEntity.php';

class supportTicketView
	{
		public function getData()
		{	
			$supportTicketEntity = new supportTicketEntity;
			$result = $supportTicketEntity -> getData();	
			
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