<?php
	require_once 'classes.php';
    session_start();
	include '../Account setting/AccountSettingController.php';
	$staffController = new AccountSettingController;
	$staffID = $_SESSION['staffID'] ?? null;
	$dbData = $staffController->retrieveDataFromDatabase($staffID);
	$img_name = $dbData['imageName'];
    
	if ($_SESSION['accountRole'] != 'Admin'){
		$message = "Please login as Admin";
		echo "<SCRIPT>
        alert('$message')
        window.location.replace('../LoginBoundary.php');
    	</SCRIPT>";
	}
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
  <link rel="stylesheet" href="staffAccountHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'staffAccountHomepageNavbar.html';?>
	<h3 class="heading-gap">Staff List</h3>

	<div class="search-container">
        <form action="/action_page.php"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Calling the delete function -->
    <?php

        if(isset($_POST["deleteStaff"]))
        {
            $staffID = $_POST['staffID'];

            $staff = new deleteStaff;
            $result = $staff -> deleteStaff($staffID);
                
            if($result)
            {
                header("Location: staffAccountHomepage.php?id=" . $_SESSION['staffID']);
            }else{
                print_r("failed");
            }
        }

		#Reset password function here         NOT DONE
		if(isset($_POST["resetStaffPassword"]))
		{

		}
    ?>

	
    <div class="button-row">
        <a href="addStaff.php?id=<?php echo $staffID; ?>" class="btn btn-primary">Add Staff</a>
		<!-- edit form submission here -->
		<form action='editStaff.php?id=<?php echo $staffID; ?>' method="POST" id="editDeleteForm">
            <button type="submit" class="btn btn-primary" name="editStaffForm">Edit Staff</button>
        <!-- delete form submission here -->
            <button type="submit" class="btn btn-primary" formaction="staffAccountHomepage.php" name="deleteStaff">Delete Staff</button>
		<!-- Reset password form submission here -->
			<button type="submit" class="btn btn-primary" formaction="staffAccountHomepage.php" name="resetStaffPassword">Reset Password</button>
        </form>    
    </div>
    
    <!-- Table of staffs go here -->
    <div class = "tableScroll">
        <table>
            <tr>
            <th></th>
            <th>Staff ID</th>
            <th>Staff Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th></th>
        </tr>

        <?php 
            $staff = new staffView;
            $result = $staff -> getData();
            if($result)
            {
                foreach($result as $row)
                {
        ?>

        <tr>
            <td>
                <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                <?php
                    $staffID = $row['staffID'];
                    $dbData = $staffController->retrieveDataFromDatabase($staffID);
                    $img_name = $dbData['imageName'];
                ?>
                    <img src="../Account setting/upload/<?php echo $img_name; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </td>
            <td><?php echo $row['staffID'] ?></td>
            <td><?php echo $row['staffName'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <!-- input for editing and deleting equipment form -->
            <td>
                <input form="editDeleteForm" type='radio' name='staffID' value='<?php echo $row['staffID']?>'>
            </td>
        </tr>
        <?php
                }
            }
        ?>
      </table>
    </div>

</body>
</html>