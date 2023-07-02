<?php
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Water Supply Management</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="LoginBoundary.css"> <!-- need css for registration form -->
</head>
<body>
<form action="registrationPage.php" method="POST">
	<h2>Welcome to<br>Water Supply Management System</h2>
	<div class="rectangle-box">
		<h3 align = 'center'>Register your<br>company account here</h3>
		<table align="center">
		<tr>
						<td><label for="username"> Username : </label>
						<input type="text" id="username" placeholder="Username" name="username" value=""></td>
					</tr>
					<tr>
						<td><label for="companyUEN">Company UEN : </label>
						<input type="text" id="companyUEN" placeholder="Company UEN" name="companyUEN" value=""></td>
					</tr>
					<tr>
						<td><label for="companyName">Company Name : </label>
						<input type="text" id="companyName" placeholder="Company Name" name="companyName" value=""></td>
					</tr>
					<tr>
						<td><label for="companyAddress">Company Address : </label>
						<input type="text" id="companyAddress" placeholder="Company Address" name="companyAddress" value=""></td>
					</tr>
					<tr>
						<td><label for="companyPhoneNumber">Company Phone Number : </label>
						<input type="text" id="companyPhoneNumber" placeholder="Company Phone Number" name="companyPhoneNumber" value=""></td>
					</tr>
					<tr>
						<td><label for="email">Email : </label>
						<input type="text" id="email" placeholder="Email" name="email" value=""></td>
					</tr>
					<tr>
						<td><label for="password">Password : </label>
						<input type="text" id="password" placeholder="Password" name="password" value=""></td>
					</tr>
					<tr>
						<td><label for="companySubscriptionType">Company Subscription Type : </label>
							<select id="companySubscriptionType" name="companySubscriptionType">
								<option value=0>Free trial 1 month</option>
								<option value=1>3 Month</option>
								<option value=2>6 Month</option>
								<option value=3>1 Year</option>
							</select>
					</tr>
					<tr>
						<td class="button-container">
							<input type="submit" name="submit" value="Add Equipment" style="border-radius: 5px;">
							<a href="equipmentHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
						</td>
					</tr>
		</table>
	</div>
</form>
</body>
</html>