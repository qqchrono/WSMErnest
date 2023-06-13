<?php
require_once 'complaintTicketEntity.php';

class assignTicket
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