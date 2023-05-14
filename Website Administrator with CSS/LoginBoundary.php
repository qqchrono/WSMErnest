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
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.rectangle-box {
  width: 400px;
  height: 390px;
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  border-radius: 5px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.profile-photo {
  width: 70px; 
  height: 70px; 
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 10px;
}
</style>
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
<!-- <td><button><a href="register.php">Click here to register</a></button></td>  -->
 </tr>
 </table>
 </div>
</form>
</body>
</html>