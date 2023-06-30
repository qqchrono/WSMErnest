<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Customer Accounts/Controllers/viewBillController.php";

	include '../Account setting/AccountSettingController.php';
	$staffController = new AccountSettingController;
	$staffID = $_SESSION['staffID'] ?? null;
	$dbData = $staffController->retrieveDataFromDatabase($staffID);
	$img_name = $dbData['imageName']; 
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
    <h3 class="heading-gap">Customer Bill Details</h3>

    <div class = "tableScroll">
        <table>
            <tr>
            <th>Bill ID</th>
            <th>Water Usage</th>
            <th>Bill Amount</th>
            <th>Bill Date</th>
            <th>Bill Due Date</th>
            <th>Customer ID</th>
            <th>Bill Status</th>
            <th>Payment Status</th>
        </tr>

        <?php         
           if(isset($_POST["viewBills"]))
           {
               $customerID = $_POST['customerID'];
               $currentPriceRate = $_POST['priceRate'];
               $currentPriceDate = $_POST['priceDate']; #using year and month WIP
   
               $bill = new viewBill;
               $result = $bill -> viewBill($customerID);
                   
               if($result)
               {
                   foreach($result as $row)
                   {
        ?>
        <tr>
            <td><?php echo $row['waterUsageID'] ?></td>
            <td><?php echo $row['waterUsage'] ?></td>
            <td><?php echo $row['billAmount'] ?></td>
            <td><?php echo $row['billDate'] ?></td>
            <td><?php echo $row['dueDate'] ?></td>
            <td><?php echo $row['customerID'] ?></td>
            <td><?php echo $row['billStatus'] ?></td>
            <td><?php echo $row['paymentStatus'] ?></td>
        </tr>
        <?php
                }
            }
            else{
                print_r("No existing bills");
            }
        }
        ?>
      </table>
      <a href="customerAccountHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
</body>
</html>