<?php
require_once 'supportTicketEntity.php';

class supportTicketDetailView
	{
		public function viewTicketDetails($supportTicketID)
		{	
			$supportTicketEntity = new supportTicketEntity;
			$result = $supportTicketEntity -> viewTicketDetails($supportTicketID);	
			
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