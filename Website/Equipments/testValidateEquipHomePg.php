<?php
    require_once 'classes.php';

    // Check if the search form is submitted
    if(isset($_GET["search"]))
    {
        $search = trim($_GET['search']);

        if(empty($search))
        {
            // Display an error message if the search input is empty
            $error = 'Please enter a search term.';
        }
        else
        {
            // Perform the search operation
            // ...
        }
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
  <link rel="stylesheet" href="equipmentHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script>
    function validateForm() {
        var searchInput = document.forms["searchForm"]["search"].value;
        if (searchInput.trim() === "") {
            alert("Please enter a search term.");
            return false;
        }
    }
  </script>
</head>
<body>
    <?php include 'equipmentNavbar.html';?>
    <h3 class="heading-gap">Equipment List</h3>

    <div class="search-container">
        <form name="searchForm" action="/action_page.php" onsubmit="return validateForm();"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">Search</button>
        </form>
        <?php if (!empty($error)): ?>
            <div style="color: red"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>

    <!-- Calling the delete function -->
    <?php

        if(isset($_POST["deleteEquipment"]))
        {
            $equipmentID = $_POST['equipmentID'];

            $equipment = new deleteEquipment;
            $result = $equipment -> deleteEquipment($equipmentID);
                
            if($result)
            {
                header("Location: equipmentHomepage.php");
            }else{
                print_r("failed");
            }
        }
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

    <!-- Table of equipment go here -->
    <div class="tableScroll">
        <table>
            <tr>
                <th>Equipment ID</th>
                <th>Equipment Name</th>
                <th>Quantity</th>
                <th>Date installed</th>
                <th>Expiry Date</th>
                <th>Warranty Date</th>
                <th></th>
            </tr>
            <?php 
                $equipment = new equipmentView;
                $result = $equipment->getData();
                if($result)
                {
                    foreach($result as $row)
                    {
            ?>
            <tr>
                <td><?php echo $row['equipmentID'] ?></td>
                <td><?php echo $row['equipmentName'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['installationDate'] ?></td>
                <td><?php echo $row['expiryDate'] ?></td>
                <td><?php echo $row['warrantyDate'] ?></td>
                <!-- input for editing and deleting equipment form -->
                <td>
                    <input form="editDeleteForm" type='radio' name='equipmentID' value='<?php echo $row['equipmentID']?>'>
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
