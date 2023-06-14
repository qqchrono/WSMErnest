<?php
require_once 'supportTicketEntity.php';

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