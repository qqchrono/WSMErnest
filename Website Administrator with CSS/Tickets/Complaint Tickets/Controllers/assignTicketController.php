<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Complaint Tickets/complaintTicketEntity.php";

class assignTicket
	{
		public function assignTicket($inputdata)
		{	
			$complaintTicketEntity = new complaintTicketEntity;
			$result = $complaintTicketEntity -> assignTicket($inputdata);	
			
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