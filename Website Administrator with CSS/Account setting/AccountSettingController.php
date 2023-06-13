<?php
$normalPath = $_SERVER['DOCUMENT_ROOT'] . '/Water-Supply-Management/Website Administrator with CSS/';
require_once $normalPath . 'Staff Accounts/staffEntity.php';

class AccountSettingController
{
    public function editOwnAccount($inputdata)
    {   
        $staffEntity = new staffEntity;
        $result = $staffEntity->editOwnAccount($inputdata);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataForEditForm($inputdata)
    {   
        $staffEntity = new staffEntity;
        $result = $staffEntity->getDataForEditForm($inputdata);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function retrieveDataFromDatabase($staffID)
    {   
        $staffEntity = new staffEntity;
        $result = $staffEntity-> retrieveDataFromDatabase($staffID);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

?>