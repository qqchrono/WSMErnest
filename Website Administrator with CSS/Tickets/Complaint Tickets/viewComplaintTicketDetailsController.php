<?php
require_once 'complaintTicketEntity.php';

class complaintTicketDetailView
	{
		public function viewTicketDetails($complaintTicketID)
		{	
			$complaintTicketEntity = new complaintTicketEntity;
			$result = $complaintTicketEntity -> viewTicketDetails($complaintTicketID);	
			
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