<?php
require_once 'customerEntity.php';

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