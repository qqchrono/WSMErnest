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
  <link rel="stylesheet" href="customerAccountHomepage.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
	<?php include 'customerAccountHomepageNavbar.html';?>
	<h3 class="heading-gap">Customer List</h3>

	<div class="search-container">
        <form action="/action_page.php" onsubmit="return validateSearchForm()">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">Search</button>
        </form>
    </div>

	<!-- Calling the delete function -->
    <?php
        // ...
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
    <div class="tableScroll">
        <table>
            <tr>
            <th></th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Ticket ID</th>
            <th></th>
        </tr>

        <?php 
            // ...
        ?>
      </table>
    </div>

    <script>
        function validateSearchForm() {
            var searchInput = document.getElementsByName("search")[0].value;

            // Validate search input
            if (searchInput.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Search field must not be blank.',
                    confirmButtonText: 'OK'
                });
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

