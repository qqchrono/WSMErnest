<?php
require_once 'complaintTicketEntity.php';

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