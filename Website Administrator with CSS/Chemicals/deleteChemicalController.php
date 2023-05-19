<?php
require_once 'chemicalEntity.php';

class deleteChemical 
	{
		public function deleteChemical($inputdata)
		{	
			$chemicalEntity = new chemicalEntity;
            $result = $chemicalEntity -> deleteChemical($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>