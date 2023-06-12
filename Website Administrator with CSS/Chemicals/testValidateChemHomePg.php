<?php
    require_once 'classes.php';
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
  <link rel="stylesheet" href="chemicalHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script>
    function validateSearchForm() {
      var searchInput = document.getElementById("searchInput").value;
      
      if (searchInput.trim() === "") {
        alert("Please enter a search query");
        return false;
      }
    }
  </script>
</head>

<body>
  <?php include 'chemicalNavbar.html';?>
  <h3 class="heading-gap">Chemical List</h3>

    <div class="search-container">
        <form action="/action_page.php" onsubmit="return validateSearchForm()">
            <input type="text" placeholder="Search..." name="search" id="searchInput">
            <button type="submit">Search</button>
        </form>
    </div>

  <!-- Calling the delete function -->
  <?php

    if(isset($_POST["deleteChemical"]))
    {
        $chemicalID = $_POST['chemicalID'];

        if ($chemicalID === "") {
          echo "Please select a chemical to delete";
        } else {
          $chemical = new deleteChemical;
          $result = $chemical -> deleteChemical($chemicalID);
            
          if($result)
          {
              header("Location: chemicalHomepage.php");
              exit;
          }else{
              echo "Failed to delete chemical";
          }
        }
    }
    ?>

    <div class="button-row">
    <a href="addChemicals.php" class="btn btn-primary">Add Chemical</a>
    <!-- edit form submission here -->
    <form action='editChemicals.php' method="POST" id="editDeleteForm" onsubmit="return validateForm()">
        <button type="submit" class="btn btn-primary" name="editChemicalForm">Edit Chemical</button>
    <!-- delete form submission here -->
        <button type="submit" class="btn btn-primary" formaction="chemicalHomepage.php" name="deleteChemical">Delete Chemical</button>
    </form>
    </div>
    
    <!-- Table of chemicals go here -->
    <div class="tableScroll">
        <table>
            <tr>
                <th>Chemical ID</th>
                <th>Chemical Name</th>
                <th>Use Time</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th></th>
            </tr>

        <?php 
    $chemical = new chemicalView;
    $result = $chemical -> getData();
    if($result)
    {
        foreach($result as $row)
        {
    ?>
        <tr>
            <td><?php echo $row['chemicalID'] ?></td>
            <td><?=$row['chemicalName'] ?></td>
            <td><?=$row['useTime'] ?></td>
            <td><?=$row['quantity'] ?></td>
            <td><?=$row['expiryDate'] ?></td>
            <!-- input for editing and deleting equipment form -->
            <td>
                <input form="editDeleteForm" type='radio' name='chemicalID' value='<?php echo $row['chemicalID']?>'>
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
