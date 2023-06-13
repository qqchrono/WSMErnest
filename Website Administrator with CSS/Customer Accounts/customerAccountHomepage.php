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
  <link rel="stylesheet" href="customerAccountHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'customerAccountHomepageNavbar.php';?>
	<h3 class="heading-gap">Customer List</h3>

	<div class="search-container">
        <form action="/action_page.php"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">Search</button>
        </form>
    </div>

	<!-- Calling the delete function -->
    <?php

        if(isset($_POST["deleteCustomer"]))
        {
            $customerID = $_POST['customerID'];

            $customer = new deleteCustomer;
            $result = $customer -> deleteCustomer($customerID);
                
            if($result)
            {
                header("Location: customerAccountHomepage.php");
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
        <a href="addCustomer.php" class="btn btn-primary">Add Customer</a>
		<!-- edit form submission here -->
		<form action='editCustomer.php' method="POST" id="editDeleteForm">
            <button type="submit" class="btn btn-primary" name="editStaffForm">Edit Customer</button>
        <!-- delete form submission here -->
            <button type="submit" class="btn btn-primary" formaction="customerAccountHomepage.php" name="deleteStaff">Delete Customer</button>
		<!-- Reset password form submission here -->
			<button type="submit" class="btn btn-primary" formaction="customerAccountHomepage.php" name="resetStaffPassword">Reset Password</button>
        </form>    
    </div>
    
    <!-- Table of staffs go here -->
    <div class = "tableScroll">
        <table>
            <tr>
            <th></th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Password</th>
            <th>Phone Number</th>
            <th>Bank Number</th>
            <th></th>
        </tr>

        <?php 
            $customer = new customerView;
            $result = $customer -> getData();
            if($result)
            {
                foreach($result as $row)
                {
        ?>

        <tr>
            <td>
                <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                    <img src="profilephoto.png" alt="profilephoto" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </td>
            <td><?php echo $row['customerID'] ?></td>
            <td><?php echo $row['customerName'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['phoneNumber'] ?></td>
            <td><?php echo $row['bankAccount'] ?></td>
            <!-- input for editing and deleting equipment form -->
            <td>
                <input form="editDeleteForm" type='radio' name='customerID' value='<?php echo $row['customerID']?>'>
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