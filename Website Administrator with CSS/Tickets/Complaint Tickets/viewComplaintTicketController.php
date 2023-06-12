<?php
require_once 'complaintTicketEntity.php';

class complaintTicketView
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