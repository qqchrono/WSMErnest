<?php
    session_start();
	include '../Account setting/AccountSettingController.php';
	$staffController = new AccountSettingController;
	$staffID = $_SESSION['staffID'] ?? null;
	$dbData = $staffController->retrieveDataFromDatabase($staffID);
	$img_name = $dbData['imageName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Water Supply Management</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="adminHomePage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</head>
<body>
	<?php include 'adminHomePageNavBar.php';?>
	<?php include '../Technical Staff Homepage/TechnicalStaffHomePageNavbar.php';?>
	 <h3 class="heading-gap">Staff List</h3>	

	<div class="button-container">
        <a href="#" class="btn btn-primary">Add new customer</a>
		<span style="margin: 0 50px;"></span>
        <a href="#" class="btn btn-primary">Add new technical staff</a>
		<span style="margin: 0 50px;"></span>
        <a href="#" class="btn btn-primary">Add new admin staff</a>
    </div>
    
    <!-- Table of staffs go here -->
	<table>
		<tr>
		  <th>?</th>
		  <th>?</th>
		  <th>?</th>
		  <th>?</th>
		  <th>?</th>
		  <th></th>
		</tr>
		<tr>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td><a href="#"><button class="arrow-button"></button></td>
		</tr>
	</table>
</body>
</html>