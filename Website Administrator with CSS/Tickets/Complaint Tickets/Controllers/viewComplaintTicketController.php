<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Complaint Tickets/complaintTicketEntity.php";

class complaintTicketView
	{
		public function getData()
		{	
			$complaintTicketEntity = new complaintTicketEntity;
			$result = $complaintTicketEntity -> getData();	
			
			if($result)
            {
				return $result;
			}
			else
            {
				return false;
			}
		}	

		public function getDataForStaff($inputdata)
		{	
			$complaintTicketEntity = new complaintTicketEntity;
			$result = $complaintTicketEntity -> getDataForStaff($inputdata);	
			
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