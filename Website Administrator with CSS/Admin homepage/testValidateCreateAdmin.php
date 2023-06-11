<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $password = test_input($_POST["password"]);
  $email = test_input($_POST["email"]);

  // Validate name
  if (empty($name)) {
    $error = "Name is required";
  }

  // Validate password
  if (empty($password)) {
    $error = "Password is required";
  } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/", $password)) {
    $error = "Password should contain at least one uppercase letter, one lowercase letter, one digit, and one special character";
  }

  // Validate email
  if (empty($email)) {
    $error = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format";
  }

  // If no errors, process the form
  if (empty($error)) {
    // Perform the necessary actions for creating a new administrator staff account
    // Redirect to success page or perform further actions
    header("Location: process_new_admin.php");
    exit;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Water Supply Management</title>
  <!-- CSS and JavaScript links removed for brevity -->
  <!-- Add the necessary CSS and JavaScript links here -->
</head>
<body>
	<?php include 'adminHomePageNavBar.html'; ?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div class="container">
		<div class="rectangle-box">
			<h3 class="heading-gap">Create new Administrator staff account</h3>
				<table align="center">
				<tr>
					<td><input type="text" placeholder="Name" name="name"></td>
				</tr>
				<tr>
					<td><input type="password" placeholder="Password" name="password"></td>
				</tr>
				<tr>
					<td><input type="text" placeholder="Email" name="email"></td>
				</tr>
				<?php if (!empty($error)) { ?>
				  <tr>
				    <td><span class="error"><?php echo $error; ?></span></td>
				  </tr>
				<?php } ?>
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
