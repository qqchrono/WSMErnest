<?php
require_once 'chemicalEntity.php';

class addChemical
	{
		public function addChemical($inputdata)
		{	
			$chemicalEntity = new chemicalEntity;
            $result = $chemicalEntity -> addChemical($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>