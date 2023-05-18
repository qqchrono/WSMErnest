<?php

    
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
  <link rel="stylesheet" href="equipments.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

<?php
	include 'addEquipmentController.php';

	if(isset($_POST["submit"]))
	{
		$inputdata = 
		[
		$equipmentName = $_POST["equipmentName"],
		$quantity= $_POST["quantity"],
		$installationDate = $_POST["installationDate"],
		$expiryDate = $_POST["expiryDate"],
		$warrantyDate = $_POST["warrantyDate"]
		];
		
		$equipment = new addEquipment;
		$result = $equipment -> addEquipment($inputdata);
		
		if($result)
		{
			print_r("success");
			header("Location: equipmentHomepage.php");
		}else{
			print_r("failed");
		}
	}
    
?>

	<?php include 'equipmentNavbar.html';?>
	
	<form action="addEquipments.php" method="POST"><!-- php file placeholder for now -->
    <h3 class="heading-gap">Add Equipment</h3>

	<div class="container">
		<div class="rectangle-box">
				<table align="center">
					<tr>
						<td><label for="equipmentName">Equipment Name : </label>
						<input type="text" id="equipmentName" placeholder="Equipment Name" name="equipmentName" value=""></td>
					</tr>
					<tr>
						<td><label for="quantity">Quantity : </label>
						<input type="text" id="quantity" placeholder="Quantity" name="quantity" value=""></td>
					</tr>
					<tr>
						<td><label for="installationDate">Installation Date : </label>
						<input type="date" id="installationDate" placeholder="Installation date" name="installationDate" value=""></td>
					</tr>
					<tr>
						<td><label for="expiryDate">Expiry Date : </label>
						<input type="date" id="expiryDate" placeholder="Expiry Date" name="expiryDate" value=""></td>
					</tr>
					<tr>
						<td><label for="warrantyDate">Warranty Date : </label>
						<input type="date" id="warrantyDate" placeholder="Warranty Date" name="warrantyDate" value=""></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Add Equipment" style="border-radius: 5px;"></td>
					</tr>
					<tr>
						<td><div style="margin-top: 10px"><a href="equipmentHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a></div></td>
					</tr>
				</table>
		</div>
	</div>
	</form>
</body>
</html>