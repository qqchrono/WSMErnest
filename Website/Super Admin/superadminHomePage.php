<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Super Admin/Controllers/superAdminViewStaffController.php";
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Super Admin/Controllers/disableAccountController.php";
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Super Admin/Controllers/enableAccountController.php";
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
  <link rel="stylesheet" href="superadminHomePage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</head>
<body>
	<?php
		include 'superadminHomePageNavBar.php';
	?>
	 <h3 class="heading-gap">Super Admin</h3>	
    
    <?php 
        if(isset($_POST["disableAccount"]))
        {
            $companyUEN = $_POST['companyUEN'];

            $disable = new disableAccount;
            $result = $disable -> disableAccount($companyUEN);
                
            if($result)
            {
                echo "<SCRIPT>
                window.location.replace('superadminHomePage.php');
                </SCRIPT>";
            }else{
                print_r("failed");
            }
        }

        if(isset($_POST["enableAccount"]))
        {
            $companyUEN = $_POST['companyUEN'];

            $enable = new enableAccount;
            $result = $enable -> enableAccount($companyUEN);
                
            if($result)
            {
                echo "<SCRIPT>
                window.location.replace('superadminHomePage.php');
                </SCRIPT>";
            }else{
                print_r("failed");
            }
        }
    ?>

    <!-- Table of staffs go here -->
	<table>
		<tr>
            <th>Staff ID</th>
            <th>Company UEN</th>
            <th>Company Name</th>
            <th>Staff Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Company Account Status</th>
            <th>Company Payment Status</th>
            <th>Company Subscription Type</th>
            <th>Company Trial Status</th>
            <th>Company Expiry Date</th>
            <th></th>
		</tr>
        <?php
        $superAdmin = new viewCompanyAdmins;
            $result = $superAdmin -> viewCompanyAdmins();
            if($result)
            {
                foreach($result as $row)
                {
        ?>
		<tr>
            <td><?php echo $row['staffID'] ?></td>
            <td><?php echo $row['companyUEN'] ?></td>
            <td><?php echo $row['companyName'] ?></td>
            <td><?php echo $row['staffName'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['companyAccountStatus'] ?></td>
            <td><?php echo $row['companyPaymentStatus'] ?></td>
            <td><?php echo $row['companySubscriptionType'] ?></td>
            <td><?php echo $row['companyTrialStatus'] ?></td>
            <td><?php echo $row['companyExpiryDate'] ?></td>
            <!-- if else here to check account status first -->
            <td>
                <form action='superadminHomePage.php' method="POST">
                    <input type='hidden' name='companyUEN' value='<?php echo $row['companyUEN']?>'>
                    <?php
                    if ($row['companyAccountStatus'] == 1)
                    {
                    ?>
                    <input type='submit' name='disableAccount' value='Disable Account'>
                    <?php
                    }
                    else if($row['companyAccountStatus'] == 0)
                    {
                    ?>
                    <input type='submit' name='enableAccount' value='Enable Account'>
                    <?php
                    }
                    ?>
                </form> 
            </td>
		</tr>

        <?php
                }
            }
        ?>
	</table>
</body>
</html>