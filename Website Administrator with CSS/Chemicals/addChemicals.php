<?php
    session_start();
	include '../Account setting/AccountSettingController.php';
	$staffController = new AccountSettingController;
	$staffID = $_SESSION['staffID'] ?? null;
	$dbData = $staffController->retrieveDataFromDatabase($staffID);
	$img_name = $dbData['imageName'];
    
	if ($_SESSION['accountRole'] != 'Admin'){
		$message = "Please login as Admin";
		echo "<SCRIPT>
        alert('$message')
        window.location.replace('../LoginBoundary.php');
    	</SCRIPT>";
	}
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
  <link rel="stylesheet" href="chemicals.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'chemicalNavbar.php'; ?>

	<?php
		include 'addChemicalController.php';

		if(isset($_POST["submit"]))
		{
			$inputdata = 
			[
			$chemicalName = $_POST["chemicalName"],
			$useTime= $_POST["useTime"],
			$quantity = $_POST["quantity"],
			$expiryDate = $_POST["expiryDate"],
			];
			
			$chemical = new addChemical;
			$result = $chemical -> addChemical($inputdata);
			
			if($result)
			{
				print_r("success");
				header("Location: chemicalHomepage.php");
			}else{
				print_r("failed");
			}
		}
		
	?>

	
	<form action="addChemicals.php" method="POST">
    <h3 class="heading-gap">Add Chemical</h3>

	<div class="container">
		<div class="rectangle-box">
				<table align="center">
				<tr>
					<td><label for="chemicalName">Chemical Name : </label>
					<input type="text" id="chemicalName" placeholder="Chemical Name" name="chemicalName" value=""></td>
				</tr>
				<tr>
					<td><label for="useTime">Use Time : </label>
					<input type="text" id="useTime" placeholder="Use Time" name="useTime" value=""></td>
				</tr>
				<tr>
					<td><label for="quantity">Quantity : </label>
					<input type="text" id="quantity" placeholder="Quantity" name="quantity" value=""></td>
				</tr>
				<tr>
					<td><label for="expiryDate">Expiry Date : </label>
					<input type="date" id="expiryDate" placeholder="Expiry Date" name="expiryDate" value=""></td>
				</tr>
				<tr>
					<td class="button-container">
						<input type="submit" name="submit" value="Add Chemical" style="border-radius: 5px;"></div>
						<a href="chemicalHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
					</td>
				</tr>
				</table>
		</div>
	</div>
	</form>
</body>
</html>