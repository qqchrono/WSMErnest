<?php
require_once 'complaintTicketEntity.php';

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