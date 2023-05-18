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
  <link rel="stylesheet" href="createnewstaffacc.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</head>
<body>
	<?php include 'adminHomePageNavBar.html';?>
	<form action="/action_page.php"><!-- php file placeholder for now -->

	<div class="container">
		<div class="rectangle-box">
			<h3 class="heading-gap">Create new Technical Staff account</h3>
				<table align="center">
				<tr>
					<td><input type="text" placeholder="Name" name="name"></td>
				</tr>
				<tr>
					<td><input type="text" placeholder="Password" name="password"></td>
				</tr>
				<tr>
					<td><input type="text" placeholder="Address" name="address"></td>
				</tr>
				<tr>
					<td><input type="text" placeholder="Email" name="email"></td>
				</tr>
				<tr>
					<td><input type="text" placeholder="Phone Number" name="phonenumber"></td>
				</tr>
				<tr>
					<td><button type="submit" style="border-radius: 5px;">Submit</button></td>
				</tr>
				<tr>
					<td><div style="margin-top: 10px"><a href="adminHomePage.php"><button type="button" style="border-radius: 5px">Back</button></a></div></td>
				</tr>
				</table>
		</div>
	</div>
	</form>
	
</body>
</html>