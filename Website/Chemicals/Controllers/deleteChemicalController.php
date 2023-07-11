<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Chemicals/chemicalEntity.php";

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