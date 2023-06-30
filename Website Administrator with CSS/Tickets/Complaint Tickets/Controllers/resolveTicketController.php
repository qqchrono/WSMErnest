<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Complaint Tickets/complaintTicketEntity.php";

class resolveTicket
	{
		public function resolveTicket($inputdata)
		{	
			$complaintTicketEntity = new complaintTicketEntity;
			$result = $complaintTicketEntity -> resolveTicket($inputdata);	
			
			if($result)
            {
				return true;
			}
			else
            {
				return false;
			}
		}	
	}

?>