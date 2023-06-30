<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Chemicals/chemicalEntity.php";
	

class editChemical
	{
		public function editChemical($inputdata)
		{	
			$chemicalEntity = new chemicalEntity;
            $result = $chemicalEntity -> editChemical($inputdata);
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	

		public function getDataForEditForm($inputdata)
		{	
			$chemicalEntity = new chemicalEntity;
            $result = $chemicalEntity -> getDataForEditForm($inputdata);
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}
	}

?>