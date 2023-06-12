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
  <link rel="stylesheet" href="editEquipments.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

<?php
	include 'editEquipmentController.php';

	$equipmentID = '';
	$equipmentName = '';
	$quantity = '';
	$installationDate = '';
	$expiryDate = '';
	$warrantyDate = '';
	$error = '';
	
	if(isset($_POST["editEquipmentForm"]))
	{
		$equipmentID = $_POST['equipmentID'];
	
		$equipment = new editEquipment;
		$result = $equipment -> getDataForEditForm($equipmentID);

		if($result)
		{
			foreach($result as $row)
        	{
				$equipmentName = $row['equipmentName'];
				$quantity = $row['quantity'];
				$installationDate = $row['installationDate'];
				$expiryDate = $row['expiryDate'];
				$warrantyDate = $row['warrantyDate'];
			}
		}
	}

	if(isset($_POST["submit"]))
	{
		$inputdata = [
			$equipmentID = $_POST['equipmentID'],
			$equipmentName = $_POST['equipmentName'],
			$quantity = $_POST['quantity'],
			$installationDate = $_POST['installationDate'],
			$expiryDate = $_POST['expiryDate'],
			$warrantyDate = $_POST['warrantyDate']
		];

		// Form validation
		if (empty($equipmentName)) {
			$error = 'Equipment name is required.';
		} elseif (!is_numeric($quantity)) {
			$error = 'Quantity must be a number.';
		} elseif ($installationDate < date('Y-m-d')) {
			$error = 'Installation date cannot be before the current date.';
		} elseif ($expiryDate < $installationDate) {
			$error = 'Expiry date cannot be before the installation date.';
		} elseif ($warrantyDate < $installationDate) {
			$error = 'Warranty date cannot be before the installation date.';
		} else {
			$equipment = new editEquipment;
			$result = $equipment->editEquipment($inputdata);
			
			if ($result) {
				header("Location: equipmentHomepage.php");
			} else {
				$error = 'Failed to edit equipment.';
			}
		}
	}
?>

	<?php include 'equipmentNavbar.html';?>
	<h3 class="heading-gap">Edit Equipment</h3>
	<form action="editEquipments.php" method="POST">
		<div class="container">
			<div class="rectangle-box">
				<table align="center">
					<tr>
						<td>
							<label for="equipmentID">Equipment ID:</label>
							<input type='text' id="equipmentID" name='equipmentID' value='<?php echo $equipmentID ?>' readonly>
						</td>
					</tr>
					<tr>
						<td>
							<label for="equipmentName">Equipment Name:</label>
							<input type="text" id="equipmentName" placeholder="Equipment Name" name="equipmentName" value="<?php echo $equipmentName ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="quantity">Quantity:</label>
							<input type="text" id="quantity" placeholder="Quantity" name="quantity" value="<?php echo $quantity ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="installationDate">Installation Date:</label>
							<input type="date" id="installationDate" placeholder="Installation date" name="installationDate" value="<?php echo $installationDate ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="expiryDate">Expiry Date:</label>
							<input type="date" id="expiryDate" placeholder="Expiry Date" name="expiryDate" value="<?php echo $expiryDate ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="warrantyDate">Warranty Date:</label>
							<input type="date" id="warrantyDate" placeholder="Warranty Date" name="warrantyDate" value="<?php echo $warrantyDate ?>">
						</td>
					</tr>
					<?php if (!empty($error)): ?>
						<tr>
							<td>
								<div style="color: red"><?php echo $error; ?></div>
							</td>
						</tr>
					<?php endif; ?>
					<tr>
						<td class="button-container">
							<input type="submit" name="submit" value="Edit Equipment" style="border-radius: 5px;">
							<a href="equipmentHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</form>

</body>
</html>
