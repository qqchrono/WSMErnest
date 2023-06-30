<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";

class changeWaterPrice
	{
		public function changeWaterPrice($inputdata)
		{	
			$priceEntity = new customerEntity;
            $result = $priceEntity -> changeWaterPrice($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>