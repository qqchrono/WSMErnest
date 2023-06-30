<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Chemicals/chemicalEntity.php";

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