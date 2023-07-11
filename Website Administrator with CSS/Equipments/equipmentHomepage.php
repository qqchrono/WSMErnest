<?php
    require_once 'classes.php';
    session_start();
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
  <link rel="stylesheet" href="equipmentHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

    <?php if ($_SESSION['accountRole'] == 'Admin')
	{
		include 'equipmentNavbar.php';
	}
	else if ($_SESSION['accountRole'] == 'Staff')
	{
		include '../Technical Staff Homepage/TechnicalStaffEquipmentNavbar.php';
	}
	?>

    <h3 class="heading-gap">Equipment List</h3>

    <div class="search-container">
        <form action="searchEquipment.php" method="GET"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="searchTerm" value="<?php if(isset($_GET['searchTerm'])) {echo $_GET['searchTerm']; }?>" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

     <!-- For search -->
     <?php 
        $equipment = new equipmentEntity;
        $inputdata = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
        $searchResult = $equipment->searchEquipment($inputdata);

        if (!empty($inputdata)) {
            $result = $searchResult;
        } else {
            $result = $equipment->getSearchData();
        }

    ?>

    <!-- Calling the delete function -->
    <?php

        if(isset($_POST["deleteEquipment"]))
        {
            $equipmentID = $_POST['equipmentID'];

            $equipment = new deleteEquipment;
            $result = $equipment -> deleteEquipment($equipmentID);
                
            if($result)
            {
                echo "<SCRIPT>
                window.location.replace('equipmentHomepage.php');
                </SCRIPT>";
            }else{
                print_r("failed");
            }
        }
        if ($_SESSION['accountRole'] == 'Admin')
        {
    ?>


    <div class="button-row">
        <a href="addEquipments.php" class="btn btn-primary">Add Equipment</a>
        <!-- edit form submission here -->
        <form action='editEquipments.php' method="POST" id="editDeleteForm">
            <button type="submit" class="btn btn-primary" name="editEquipmentForm">Edit Equipment</button>
        <!-- delete form submission here -->
            <button type="submit" class="btn btn-primary" formaction="equipmentHomepage.php" name="deleteEquipment">Delete Equipment</button>
        </form>
    </div>

    <?php
        }
    ?>

	<!-- Table of equipment go here -->
    <div class = "tableScroll">
      <table>
        <tr>
            <th>Equipment ID</th>
            <th>Equipment Name</th>
            <th>Quantity</th>
            <th>Technical Parameters</th>
            <th>Date installed</th>
            <th>Expiry Date</th>
            <th>Warranty Date</th>
            <th></th>
        </tr>
  <?php 
    $equipment = new equipmentView;
    $result = $equipment -> getData();
    if($result)
    {
        foreach($result as $row)
        {
    ?>
        <tr>
            <td><?php echo $row['equipmentID'] ?></td>
            <td><?=$row['equipmentName'] ?></td>
            <td><?=$row['quantity'] ?></td>
            <td><?=$row['technicalParameters'] ?></td>
            <td><?=$row['installationDate'] ?></td>
            <td><?=$row['expiryDate'] ?></td>
            <td><?=$row['warrantyDate'] ?></td>
            <!-- input for editing and deleting equipment form -->
            <td>
                <?php
                    if ($_SESSION['accountRole'] == 'Admin')
                    {
                ?>
                <input form="editDeleteForm" type='radio' name='equipmentID' value='<?php echo $row['equipmentID']?>'>
                <?php
                    }
                ?>
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