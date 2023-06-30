<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
    $path2 = $_SERVER['DOCUMENT_ROOT'];

    include_once $path . "/Water-Supply-Management/Website Administrator with CSS/DatabaseConnection.php";
    
    include_once $path2 .  "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/viewCustomerController.php";
    include_once $path2 . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/deleteCustomerController.php";
    include_once $path2 . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/waterPriceViewController.php";
    include_once $path2 . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/editWaterRateController.php";
    include_once $path2 . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/searchCusAccController.php";
    include_once $path2 . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/viewBillController.php";

?>