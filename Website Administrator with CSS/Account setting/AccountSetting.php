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
  <link rel="stylesheet" href="AccountSetting.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>

<body>

<?php
	session_start();
	include 'AccountSettingController.php';

    $staffID = '';
    $staffName = '';
    $email = '';
    $password = '';
    $role = '';
    $status = '';
	$img_name = '';
	$new_img_name = '';

    $staffController = new AccountSettingController;

	if (isset($_SESSION['staffID'])) {
		$staffID = $_SESSION['staffID'];
		$result = $staffController->retrieveDataFromDatabase($staffID);
		if($result)
		{
				$staffID = $result['staffID'];
				$staffName = $result['staffName'];
				$email = $result['email'];
				$password = $result['password'];
				$role = $result['role'];
				$imageName = $result['imageName'];
		
		}
	}


	if (!isset($_SESSION['img_name'])) {
		$dbData = $staffController->retrieveDataFromDatabase($staffID);
		if ($dbData) {
			$img_name = $dbData['imageName'];
			$_SESSION['img_name'] = $img_name;
		}
	} else {
		$img_name = $_SESSION['img_name'];
	}

	if (isset($_POST["submit"])) {
		$staffID = $_POST['staffID'];
		$staffName = $_POST['staffName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$img_name = !empty($_FILES['pp']['name']) ? $_FILES['pp']['name'] : '';
		$new_img_name = !empty($img_name) ? uniqid($staffName, true) . '.' . pathinfo($img_name, PATHINFO_EXTENSION) : '';



		$staffController = new AccountSettingController;
		$result = $staffController->editOwnAccount([
			'staffID' => $staffID,
			'staffName' => $staffName,
			'email' => $email,
			'password' => $password,
			'role' => $role,
			'new_img_name' => $new_img_name,
		]);

		if (isset($_FILES['pp']['name']) && !empty($_FILES['pp']['name'])) {
			$uname = $staffName;
			$img_name = $_FILES['pp']['name'];
			$tmp_name = $_FILES['pp']['tmp_name'];
			$error = $_FILES['pp']['error'];

			if ($error === 0) {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_to_lc = strtolower
				($img_ex);

				$allowed_exs = array('jpg', 'jpeg', 'png');
				if (in_array($img_ex_to_lc, $allowed_exs)) {
					$new_img_name = $img_name;
					$destination_directory = $_SERVER['DOCUMENT_ROOT'] . '/Water-Supply-Management/Website Administrator with CSS/Account setting/upload';
					if (!is_dir($destination_directory)) {
						mkdir($destination_directory, 0777, true);
					}
					$img_upload_path = $destination_directory . '/' . $new_img_name;


					$old_pp_des = realpath("upload/") . '/' . $img_name;

					if (file_exists($old_pp_des)) {
						unlink($old_pp_des);
					}

					move_uploaded_file($tmp_name, $destination_directory . '/' . $new_img_name);


					$staff = new AccountSettingController;
					$result = $staff->editOwnAccount([
						'staffID' => $staffID,
						'staffName' => $staffName,
						'email' => $email,
						'password' => $password,
						'role' => $role,
						'new_img_name' => $new_img_name,
					]);

					if ($result) {
						$_SESSION['new_img_name'] = $new_img_name;
						$_SESSION['img_name'] = $img_name;
						header("Location:  ../Admin homepage/adminHomePage.php");
						exit();
					} else {
						echo "Failed to update the database.";
					}
				} else {
					echo "You can't upload files of this type.";
				}
			} else {
				echo "Unknown error occurred!";
			}
		} else {
			if ($result) {
				header("Location: ../Admin homepage/adminHomePage.php");
				exit();
			} else {
				echo "Failed to update the database.";
			}
		}
	}
?>
	<?php if ($_SESSION['accountRole'] == 'Admin')
	{
		include 'AccountSettingNavbar.php';
	}
	else if ($_SESSION['accountRole'] == 'Staff')
	{
		include '../Technical Staff Homepage/TechnicalStaffAccountSettingNavbar.php';
	}
	?>

	<form action="AccountSetting.php" method="POST" enctype="multipart/form-data">
	<h3 class="heading-gap">Account Setting</h3>
		<div class="container">
			<div class="rectangle-box">
					<table align="center">
					<tr>
						<td><label for="staffID">Staff ID : </label>
						<input type='text' id="staffID" name='staffID' value='<?php echo $staffID ?>' readonly></td>
					</tr>
					<tr>
						<td><label for="staffName">Staff Name : </label>
						<input type="text" id="staffName" placeholder="Staff Name" name="staffName" value="<?php echo $staffName ?>"></td>
					</tr>
					<tr>
						<td><label for="email">Email : </label>
						<input type="text" id="email" placeholder="Email" name="email" value="<?php echo $email ?>"></td>
					</tr>
					<tr>
						<td><label for="password">Password : </label>
						<input type="text" id="password" placeholder="Password" name="password" value="<?php echo $password ?>"></td>
					</tr>
					<tr>
						<td><label for="role">Role : </label>
							<select id="role" name="role">
                                <option value="Staff">Staff</option>
								<option value="Admin" selected>Admin</option>
							</select>
						</td>
					</tr>
					<tr>
					  <td style="display: flex; justify-content: center; align-items: center; margin-bottom:20px">
					  <img src="../Account setting/upload/<?php echo !empty($new_img_name) ? $new_img_name : $img_name; ?>" width="80" height="80" title="<?php echo !empty($new_img_name) ? $new_img_name : $img_name; ?>" style="border-radius: 50%;"></td>
					</tr>
					<tr>
						 <td> <label class="form-label">Profile Picture : </label>
						  <input type="file" class="form-control" name="pp" style="width: 310px;">
						  <input type="hidden" name="old_pp" value="<?=$img_name?>">
					  </td>
					</tr>

					<tr>
						<td class="button-container">
							<input type="submit" name="submit" value="Edit Details" style="border-radius: 5px;">
							<a href="../Admin homepage/adminHomePage.php"><button type="button" style="border-radius: 5px">Back</button></a>
						</td>
					</tr>
					</table>
			</div>
		</div>
	</form>
</body>
</html>