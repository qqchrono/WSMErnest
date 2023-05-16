<?php
    
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
    <div class="w3-top">
	<?php include 'customerAccountHomepageNavbar.html';?>
    <h3 class="heading-gap">Customer List</h3>

    <div class="button-container">
        <a href="#" class="btn btn-primary">Add Customer</a>
        <a href="#" class="btn btn-primary">Edit Customer</a>
        <a href="#" class="btn btn-primary">Delete Customer</a>
        <a href="#" class="btn btn-primary">Reset Password</a>
        <!-- Current Rate dynamically changing here -->
		<div class="box">
			<p>Current Rate: $</p>
			<!-- Current Rate value here -->
		</div>
        <a href="#" class="btn btn-primary">Edit Water Rate</a>
    </div>
    
    <!-- Table of customers go here -->
	
	<table>
		<tr>
		  <th colspan="6"></th>
		</tr>
		<tr>
		  <td>
		  <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
			<img src="profilephoto.png" alt="profilephoto" style="width: 100%; height: 100%; object-fit: cover;">
		  </div></td>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td class="right-align"><a href="#"><button>View Bills</button></a></td>
		</tr>
	</table>
    </div>

</body>
</html>