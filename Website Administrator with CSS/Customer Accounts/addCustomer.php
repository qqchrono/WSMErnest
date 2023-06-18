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
  <link rel="stylesheet" href="addCustomer.css"> <!-- css check -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		include 'addCustomerController.php';

		if(isset($_POST["submit"]))
		{
			$inputdata = 
			[
			$customerName = $_POST["customerName"],
			$email= $_POST["email"],
            $address= $_POST["address"],
			$password = $_POST["password"],
			$phoneNumber = $_POST["phoneNumber"],
			$bankNumber = $_POST["bankNumber"]
			];
			
			$customer = new addCustomer;
			$result = $customer -> addCustomer($inputdata);
			
			if($result)
			{
				print_r("success");
				header("Location: customerAccountHomepage.php");
			}else{
				print_r("failed");
			}
		}
		
	?>

	<?php include 'customerAccountHomepageNavbar.php';?>
	
	<form action="addCustomer.php" method="POST">
	<h3 class="heading-gap">Add Customer</h3>

	<div class="container">
		<div class="rectangle-box">
				<table align="center">
					<tr>
						<td><label for="customerName">Customer Name : </label>
						<input type="text" id="customerName" placeholder="Customer Name" name="customerName" value=""></td>
					</tr>
					<tr>
						<td><label for="email">Email : </label>
						<input type="text" id="email" placeholder="email" name="email" value=""></td>
					</tr>
                    <tr>
						<td><label for="address">Address : </label>
						<input type="text" id="address" placeholder="address" name="address" value=""></td>
					</tr>
					<tr>
						<td><label for="password">Password : </label>
						<input type="text" id="password" placeholder="password" name="password" value=""></td>
					</tr>
					<tr>
						<td><label for="phoneNumber">Phone Number : </label>
						<input type="text" id="phoneNumber" placeholder="Phone Number" name="phoneNumber" value=""></td>
					</tr>
					<tr>
						<td><label for="bankNumber">Bank Number : </label>
						<input type="text" id="bankNumber" placeholder="Bank Number" name="bankNumber" value=""></td>
					</tr>
					<tr>
						<td class="button-container">
							<input type="submit" name="submit" value="Add Customer" style="border-radius: 5px;">
							<a href="customerAccountHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
						</td>
					</tr>
				</table>
		</div>
	</div>
	</form>
	
</body>
</html>