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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<style>
body {
  font-family: "Lato", sans-serif;
  margin: 0;
  padding: 0;
}

.active {
  font-weight: bold;
}

.navbar-links {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.navbar-links a {
  padding: 8px 16px;
}

.heading-gap {
  margin-left: 10px;
  margin-bottom: 10px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 500px;
}

.rectangle-box {
  width: 340px;
  height: 250px;
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.rectangle-box input {
  margin-bottom: 20px;
  width: 100%;
  margin-right: 100px;
  box-sizing: border-box;
}

</style>
</head>
<body>
	<div class="w3-top">
		<div class="w3-bar w3-blue w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<div class="navbar-links" style="justify-content: space-between;">
				<div style="flex-grow: 0;">
					<a href="adminHomePage.php" class="w3-bar-item w3-button w3-padding-large">Admin</a>
				</div>
				<div style="flex-grow: 1; display: flex; justify-content: center;">
					<a href="notifications.php" class="w3-bar-item w3-button w3-padding-large">Notification</a>
					<a href="ticketHomepage.php" class="w3-bar-item w3-button w3-padding-large">Tickets</a>
					<a href="chemicalHomepage.php" class="w3-bar-item w3-button w3-padding-large">Chemicals</a>
					<a href="equipmentHomepage.php" class="w3-bar-item w3-button w3-padding-large">Equipments</a>
					<div class="w3-dropdown-hover w3-hide-small">
						<button class="w3-padding-large w3-button active" title="More">Accounts<i class="fa fa-caret-down"></i></button>
					<div class="w3-dropdown-content w3-bar-block w3-card-4">
						<a href="customerAccountHomepage.php" class="w3-bar-item w3-button">Customer Accounts</a>
						<a href="staffAccountHomepage.php" class="w3-bar-item w3-button active">Staff Accounts</a>
					</div>
					</div>
				</div>
				<div>
					<a href="LoginBoundary.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Log out</a>
				</div>
			</div>
		</div>
	<form action="/action_page.php"><!-- php file placeholder for now -->
	<h3 class="heading-gap">Add Staff</h3>

	<div class="container">
		<div class="rectangle-box">
				<table align="center">
				<tr>
					<td><input type="text" placeholder="Name" name="name"></td>
				</tr>
				<tr>
					<td><input type="text" placeholder="Email" name="email"></td>
				</tr>
				<tr>
					<td><button type="submit" style="border-radius: 5px">Add Staff</button></td>
				</tr>
				<tr>
					<td><div style="margin-top: 10px"><a href="staffAccountHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a></div></td>
				</tr>
				</table>
		</div>
	</div>
	</form>
	
</body>
</html>