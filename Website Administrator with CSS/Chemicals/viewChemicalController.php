<?php
require_once 'chemicalEntity.php';

class chemicalView
	{
		public function getData()
		{	
			$chemicalEntity = new chemicalEntity;
			$result = $chemicalEntity -> getData();	
			
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