<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Complaint Tickets/complaintTicketEntity.php";

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