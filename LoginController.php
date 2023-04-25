<?php
    include 'AccountEntity.php';
    
    class Login 
	{
		public function checkAccount($inputdata)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> checkAccount($inputdata);	
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}
?>