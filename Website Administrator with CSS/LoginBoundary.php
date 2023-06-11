<?php
	include 'LoginController.php';

	if(isset($_POST["submit"]))
	{
		$inputdata = [
		//Grab data from user
		$user = $_POST["user"],
		$pass = $_POST["pass"]
		];
		
		$testlogin = new Login($inputdata);
		$result = $testlogin->checkAccount($inputdata);

		if($result == "Admin")
		{
			header("Location: Admin homepage/adminHomePage.php");
		}
		else if ($result == "Staff")
		{
			header("Location: Technical Staff Homepage/technicalStaffHomePage.php");
		}
		else
		{
			echo $result;
			print_r("failed");
		}


	}
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
<link rel="stylesheet" href="LoginBoundary.css">
</head>
<body>
<form action="loginBoundary.php" method="post">
<h2>Welcome to<br>Water Supply Management System</h2>


<div class="rectangle-box">
 <h3>Please log in first</h3>
 <table align="center">
 <tr>
	<td><img class="profile-photo" src="profilephoto.png" alt="Profile Photo"></td>
 </tr>
 <tr>
  <td>Enter your name: <input type="text" class="form-control" placeholder="User Name" name="user" required="required"></td>
 </tr>
 <tr>
  <td>Enter your password: <input type="password" class="form-control" placeholder="Password" name="pass" required="required"></td>
 </tr>
 <tr>
  <td><input type="submit" class="btn btn-primary btn-block" name="submit" value="Login"></td>
 </tr>
  <tr>
 </tr>
 </table>
 </div>
</form>
</body>
</html>