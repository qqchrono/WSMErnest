<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Chemicals/chemicalEntity.php";

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