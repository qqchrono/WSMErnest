<?php
require_once 'customerEntity.php';

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