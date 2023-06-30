<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Support Tickets/supportTicketEntity.php";


class supportTicketView
	{
		public function getData()
		{	
			$supportTicketEntity = new supportTicketEntity;
			$result = $supportTicketEntity -> getData();	
			
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