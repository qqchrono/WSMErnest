<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Water Supply Management</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'Homepages/navbar.php';?> <!-- navbar here -->
    <h2>Customer List</h2>

    <div>
        <a href="#" class="btn btn-primary">Add Customer</a>
        <a href="#" class="btn btn-primary">Edit Customer</a>
        <a href="#" class="btn btn-primary">Delete Customer</a>
        <a href="#" class="btn btn-primary">Reset Password</a>
        <!-- Current Rate dynamically changing here -->
        <a href="#" class="btn btn-primary">Edit Water Rate</a>
    </div>
    
    <div>
        <!-- Table of staffs go here -->
    </div>

</body>
</html>