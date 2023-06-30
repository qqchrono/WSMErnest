<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Chemicals/chemicalEntity.php";


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