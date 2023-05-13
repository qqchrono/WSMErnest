<?php
	include 'LoginController.php';

	if(isset($_POST["submit"]))
	{
		$inputdata = [
		//Grab data from user
		$user = $_POST["user"],
		$pass = $_POST["pass"],
		];
		
		$testlogin = new Login($inputdata);
		$result = $testlogin->checkAccount($inputdata);

		if($result == "Admin")
		{
			header("Location: AdminPage.html");
		}
		else if ($result == "Customer")
		{
			header("Location: CustomerPage.html");
		}
		else if ($result == "Staff")
		{
			header("Location: StaffPage.html");
		}
		else
		{
			print_r("failed");
		}


	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Water Supply Management</title>
<link rel ="stylesheet" href = "LoginBoundary.css">
</head>
<body>
<form action="loginBoundary.php" method="post">
<h1>Welcome to<br>Water Supply Management System</h1>
<img src="" alt="" class="center">
 <h2>Please log in first</h2>
 <table align="center">
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
<!-- <td><button><a href="register.php">Click here to register</a></button></td>  -->
 </tr>
 </table>
</form>
</body>
</html>