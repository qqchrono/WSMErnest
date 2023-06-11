<?php
	include 'LoginController.php';

	$error = ""; // Variable to store the error message

	if(isset($_POST["submit"]))
	{
		$user = $_POST["user"];
		$pass = $_POST["pass"];

		// Validate username as an email
		if(!filter_var($user, FILTER_VALIDATE_EMAIL))
		{
			$error = "Invalid email format";
		}
		// Validate password to contain uppercase, lowercase, and special characters
		else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).+$/", $pass))
		{
			$error = "Password should contain at least one uppercase letter, one lowercase letter, and one special character";
		}
		else
		{
			$inputdata = [
				"user" => $user,
				"pass" => $pass,
			];
			
			$testlogin = new Login($inputdata);
			$result = $testlogin->checkAccount($inputdata);

			if($result == "Admin")
			{
				header("Location: AdminPage.html");
				exit;
			}
			else if ($result == "Customer")
			{
				header("Location: CustomerPage.html");
				exit;
			}
			else if ($result == "Staff")
			{
				header("Location: StaffPage.html");
				exit;
			}
			else
			{
				$error = "Login failed";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Water Supply Management</title>
<link rel="stylesheet" href="LoginBoundary.css">
</head>
<body>
<form action="loginBoundary.php" method="post">
	<h1>Welcome to<br>Water Supply Management System</h1>
	<img src="" alt="" class="center">
	<h2>Please log in first</h2>
	<!-- Display error message if present -->
	<?php if($error): ?>
		<p class="error"><?php echo $error; ?></p>
	<?php endif; ?>
	<table align="center">
		<tr>
			<td>Enter your email: <input type="email" class="form-control" placeholder="Email" name="user" required="required"></td>
		</tr>
		<tr>
			<td>Enter your password: <input type="password" class="form-control" placeholder="Password" name="pass" required="required"></td>
		</tr>
		<tr>
			<td><input type="submit" class="btn btn-primary btn-block" name="submit" value="Login"></td>
		</tr>
		<tr>
			<!-- <td><button><a href="register.php">Click here to register</a></button></td> -->
		</tr>
	</table>
</form>
</body>
</html>
