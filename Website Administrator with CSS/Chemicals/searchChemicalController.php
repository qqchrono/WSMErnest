<?php
require_once 'chemicalEntity.php';

class searchChemical
	{
		public function searchChemical($inputdata)
		{	
			$chemicalEntity = new chemicalEntity;
            $result = $chemicalEntity -> searchChemical($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>