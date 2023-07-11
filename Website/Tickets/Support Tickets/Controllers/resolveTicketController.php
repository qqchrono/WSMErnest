<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Support Tickets/supportTicketEntity.php";

class resolveTicket
	{
		public function resolveTicket($inputdata)
		{	
			$supportTicketEntity = new supportTicketEntity;
			$result = $supportTicketEntity -> resolveTicket($inputdata);	
			
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