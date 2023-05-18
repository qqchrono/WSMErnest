<?php
    require_once 'classes.php'; #Equipment controllers here
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
	<?php include 'equipmentNavbar.html';?>
    <h3 class="heading-gap">Equipment List</h3>

    <div class="search-container">
        <form action="/action_page.php"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="button-container">
        <a href="addEquipments.php" class="btn btn-primary">Add Equipment</a>
        <!-- edit form submission here -->
        <form action='editEquipments.php' method="POST" id="editForm">
            <input type="submit" class="btn btn-primary" name="editEquipment" value="Edit Equipment"></input>
        </form>
        <a href="#" class="btn btn-primary">Delete Equipment</a>
    </div>


	<!-- Table of equipment go here -->
    <div class = "tableScroll">
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
            <td><?=$row['installationDate'] ?></td>
            <td><?=$row['expiryDate'] ?></td>
            <td><?=$row['warrantyDate'] ?></td>
            <!-- input for editing equipment form -->
            <td>
                <input form="editForm" type='radio' name='equipmentName' value='<?php echo $row['equipmentName']?>'>
                <input form="editForm" type='hidden' name='quantity' value='<?php echo $row['quantity']?>'>
                <input form="editForm" type='hidden' name='installationDate' value='<?php echo $row['installationDate']?>'>
                <input form="editForm" type='hidden' name='expiryDate' value='<?php echo $row['expiryDate']?>'>
                <input form="editForm" type='hidden' name='warrantyDate' value='<?php echo $row['warrantyDate']?>'>
            </td>
            <!-- input for deleting equipment form -->
        </tr>
  <?php
        }
    }
  ?>
  
       </table>
    </div>

</body>
</html>