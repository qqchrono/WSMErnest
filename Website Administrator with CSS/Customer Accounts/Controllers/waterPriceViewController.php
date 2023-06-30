<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/customerEntity.php";

class waterPriceView
	{
		public function getWaterPrice()
		{	
			$priceEntity = new customerEntity;
            $result = $priceEntity -> getWaterPrice();
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>