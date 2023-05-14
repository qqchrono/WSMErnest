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

.button-container {
  margin-left: 25%;
  margin-bottom: 10px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

td {
  background-color: #f2f2f2;
}

button {
  padding: 5px 10px;
  border: none;
  background-color: #1f456e;
  color: white;
  cursor: pointer;
}

button:hover {
  background-color: #59788e;
}

.arrow-button {
  width: 20px;
  height: 20px;
  background-color: transparent;
  border: none;
  padding: 0;
  position: relative;
}

.arrow-button::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(45deg);
  width: 10px;
  height: 10px;
  border-top: 2px solid black;
  border-right: 2px solid black;
}

</style>
</head>
<body>
    <div class="w3-top">
		<div class="w3-bar w3-blue w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<div class="navbar-links" style="justify-content: space-between;">
				<div style="flex-grow: 0;">
					<a href="adminHomePage.php" class="w3-bar-item w3-button w3-padding-large active">Admin</a>
				</div>
				<div style="flex-grow: 1; display: flex; justify-content: center;">
					<a href="notifications.php" class="w3-bar-item w3-button w3-padding-large">Notification</a>
					<a href="ticketHomepage.php" class="w3-bar-item w3-button w3-padding-large">Tickets</a>
					<a href="chemicalHomepage.php" class="w3-bar-item w3-button w3-padding-large">Chemicals</a>
					<a href="equipmentHomepage.php" class="w3-bar-item w3-button w3-padding-large">Equipments</a>
					<div class="w3-dropdown-hover w3-hide-small">
						<button class="w3-padding-large w3-button" title="More">Accounts<i class="fa fa-caret-down"></i></button>
					<div class="w3-dropdown-content w3-bar-block w3-card-4">
						<a href="customerAccountHomepage.php" class="w3-bar-item w3-button">Customer Accounts</a>
						<a href="staffAccountHomepage.php" class="w3-bar-item w3-button">Staff Accounts</a>
					</div>
					</div>
				</div>
				<div>
					<a href="LoginBoundary.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Log out</a>
				</div>
			</div>
		</div>
		
	 <h3 class="heading-gap">Staff List</h3>	
   <h3 class="heading-gap">Staff List 2</h3>	

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
	
    </div>

</body>
</html>