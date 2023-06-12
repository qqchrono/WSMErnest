<?php
require_once 'complaintTicketEntity.php';

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