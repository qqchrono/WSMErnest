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
  <link rel="stylesheet" href="editCustomer.css"> <!-- css check -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>

<body>

<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/editCustomerController.php";

	$customerID = '';
	$customerName = '';
	$email = '';
    $address = '';
	$password = '';
	$phoneNumber = '';
	$bankNumber = '';
	
	if(isset($_POST["editCustomerForm"]))
	{
		$customerID = $_POST['customerID'];
	
		$customer = new editCustomer;
		$result = $customer -> getDataForEditForm($customerID);
		if($result)
		{
			foreach($result as $row)
        	{
				$customerName = $row['customerName'];
				$email = $row['email'];
                $address = $row['address'];
				$password = $row['password'];
				$phoneNumber = $row['phoneNumber'];
				$bankNumber = $row['bankAccount'];
			}
		}
	}

	if(isset($_POST["submit"]))
	{
		$inputdata = [
			$customerID = $_POST['customerID'],
			$customerName = $_POST['customerName'],
			$email = $_POST['email'],
            $address = $_POST['address'],
			$password = $_POST['password'],
			$phoneNumber = $_POST['phoneNumber'],
			$bankNumber = $_POST['bankNumber']
		];

		$customer = new editCustomer;
		$result = $customer -> editCustomer($inputdata);
			
		if($result)
		{
			header("Location: customerAccountHomepage.php");
		}else{
			print_r("failed");
		}
	}
?>

	<?php include 'customerAccountHomepageNavbar.php';?>
	<form action="editCustomer.php" method="POST">
	<h3 class="heading-gap">Edit Customer</h3>
		<div class="container">
			<div class="rectangle-box">
					<table align="center">
					<tr>
						<td><label for="customerID">Customer ID : </label>
						<input type='text' id="customerID" name='customerID' value='<?php echo $customerID ?>' readonly></td>
					</tr>
					<tr>
						<td><label for="customerName">Customer Name : </label>
						<input type="text" id="customerName" name="customerName" value="<?php echo $customerName ?>"></td>
					</tr>
					<tr>
						<td><label for="email">Email : </label>
						<input type="text" id="email" name="email" value="<?php echo $email ?>"></td>
					</tr>
                    <tr>
						<td><label for="address">Address : </label>
						<input type="text" id="address" name="address" value="<?php echo $address ?>"></td>
					</tr>
					<tr>
						<td><label for="password">Password : </label>
						<input type="text" id="password" name="password" value="<?php echo $password ?>"></td>
					</tr>
					<tr>
						<td><label for="phoneNumber">Phone Number : </label>
						<input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber ?>"></td>
					</tr>
					<tr>
						<td><label for="bankNumber">Bank Number : </label>
						<input type="text" id="bankNumber" name="bankNumber" value="<?php echo $bankNumber ?>"></td>
					</tr>
					<tr>
						<td class="button-container">
							<input type="submit" name="submit" value="Edit Customer" style="border-radius: 5px;">
							<a href="customerAccountHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
						</td>
					</tr>
					</table>
			</div>
		</div>
	</form>
</body>
</html>