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
  <link rel="stylesheet" href="chemicalHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

<?php

    if ($_SESSION['accountRole'] == 'Admin')
    {
        include 'chemicalNavbar.php';
    }
    else if ($_SESSION['accountRole'] == 'Staff')
    {
        include '../Technical Staff Homepage/TechnicalStaffChemicalNavbar.php';
    }

?>
    <h3 class="heading-gap">Chemical List</h3>

    <div class="search-container">
        <form action="searchChemical.php" method="GET"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="searchTerm" value="<?php if(isset($_GET['searchTerm'])) {echo $_GET['searchTerm']; }?>" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

<?php
    $chemical = new chemicalEntity;
    $inputdata = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
    $searchResult = $chemical->searchChemical($inputdata);

    if (!empty($inputdata)) {
        $result = $searchResult;
    } else {
        $result = $chemical->getSearchData();
    }
?>

    <!-- Calling the delete function -->
    <?php

    if(isset($_POST["deleteChemical"]))
    {
        $chemicalID = $_POST['chemicalID'];

        $chemical = new deleteChemical;
        $result = $chemical -> deleteChemical($chemicalID);
            
        if($result)
        {
            header("Location: searchChemical.php");
        }else{
            print_r("failed");
        }
    }
    if ($_SESSION['accountRole'] == 'Admin')
    {
    ?>
    
    <div class="button-row">
    <a href="addChemicals.php" class="btn btn-primary">Add Chemical</a>
    <!-- edit form submission here -->
    <form action='editChemicals.php' method="POST" id="editDeleteForm">
        <button type="submit" class="btn btn-primary" name="editChemicalForm">Edit Chemical</button>
    <!-- delete form submission here -->
        <button type="submit" class="btn btn-primary" formaction="chemicalHomepage.php" name="deleteChemical">Delete Chemical</button>
    </form>
    </div>

    <?php
    }
    ?>

    <!-- Table of chemicals go here -->
    <div class = "tableScroll">
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
            if ($result) {
                foreach($result as $row) {
        ?>
        <tr>
            <td><?php echo $row['chemicalID'] ?></td>
            <td><?php echo $row['chemicalName'] ?></td>
            <td><?php echo $row['useTime'] ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['expiryDate'] ?></td>
            <!-- input for editing and deleting equipment form -->
            <td>
                <?php
                    if ($_SESSION['accountRole'] == 'Admin')
                    {
                ?>
                    <input form="editDeleteForm" type='radio' name='chemicalID' value='<?php echo $row['chemicalID']?>'>
                <?php
                    }
                ?>
            </td>
        </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='6'>No results found.</td></tr>";
            }
        ?>
    </table>
    </div>
</body>
</html>