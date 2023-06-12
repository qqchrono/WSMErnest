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
  <link rel="stylesheet" href="editChemicals.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script>
    function validateForm() {
      var chemicalName = document.forms["editChemicalForm"]["chemicalName"].value;
      var useTime = document.forms["editChemicalForm"]["useTime"].value;
      var quantity = document.forms["editChemicalForm"]["quantity"].value;
      var expiryDate = document.forms["editChemicalForm"]["expiryDate"].value;

      if (chemicalName === "" || useTime === "" || quantity === "" || expiryDate === "") {
        alert("All fields must be filled out");
        return false;
      }

      if (isNaN(useTime) || isNaN(quantity)) {
        alert("Use Time and Quantity must be numeric values");
        return false;
      }

      var today = new Date();
      var selectedDate = new Date(expiryDate);

      if (selectedDate <= today) {
        alert("Expiry Date must be a future date");
        return false;
      }
    }
  </script>
</head>

<body>
  <?php
  include 'editChemicalController.php';

  $chemicalID = '';
  $chemicalName = '';
  $useTime = '';
  $quantity = '';
  $expiryDate = '';

  if (isset($_POST["editChemicalForm"])) {
    $chemicalID = $_POST['chemicalID'];

    $chemical = new editChemical;
    $result = $chemical->getDataForEditForm($chemicalID);

    if ($result) {
      foreach ($result as $row) {
        $chemicalName = $row['chemicalName'];
        $useTime = $row['useTime'];
        $quantity = $row['quantity'];
        $expiryDate = $row['expiryDate'];
      }
    }
  }

  if (isset($_POST["submit"])) {
    $inputdata = [
      $chemicalID = $_POST['chemicalID'],
      $chemicalName = $_POST['chemicalName'],
      $useTime = $_POST['useTime'],
      $quantity = $_POST['quantity'],
      $expiryDate = $_POST['expiryDate'],
    ];

    $chemical = new editChemical;
    $result = $chemical->editChemical($inputdata);

    if ($result) {
      header("Location: chemicalHomepage.php");
    } else {
      print_r("failed");
    }
  }
  ?>

  <?php include 'chemicalNavbar.html'; ?>
  <form action="editChemicals.php" method="POST" onsubmit="return validateForm()" name="editChemicalForm">
    <h3 class="heading-gap">Edit Chemical</h3>
    <div class="container">
      <div class="rectangle-box">
        <table align="center">
          <tr>
            <td><label for="chemicalID">Chemical ID : </label>
              <input type='text' id="chemicalID" name='chemicalID' value='<?php echo $chemicalID ?>' readonly></td>
          </tr>
          <tr>
            <td><label for="chemicalName">Chemical Name : </label>
              <input type="text" id="chemicalName" placeholder="Chemical Name" name="chemicalName" value="<?php echo $chemicalName ?>"></td>
          </tr>
          <tr>
            <td><label for="useTime">Use Time : </label>
              <input type="text" id="useTime" placeholder="Use Time" name="useTime" value="<?php echo $useTime ?>"></td>
          </tr>
          <tr>
            <td><label for="quantity">Quantity : </label>
              <input type="text" id="quantity" placeholder="Quantity" name="quantity" value="<?php echo $quantity ?>"></td>
          </tr>
          <tr>
            <td><label for="expiryDate">Expiry Date : </label>
              <input type="date" id="expiryDate" placeholder="Expiry Date" name="expiryDate" value="<?php echo $expiryDate ?>"></td>
          </tr>
          <tr>
            <td class="button-container">
              <input type="submit" name="submit" value="Edit Chemical" style="border-radius: 5px;">
              <a href="chemicalHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </form>
</body>

</html>
