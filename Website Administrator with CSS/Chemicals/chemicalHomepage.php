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
  <link rel="stylesheet" href="chemicalHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>

<body>
	<?php include 'chemicalNavbar.html';?>
	<h3 class="heading-gap">Chemical List</h3>

    <div class="search-container">
        <form action="/action_page.php"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="button-container">
        <a href="addChemicals.php" class="btn btn-primary">Add Chemical</a>
        <a href="editChemicals.php" class="btn btn-primary">Edit Chemical</a>
        <a href="#" class="btn btn-primary">Delete Chemical</a>
    </div>
    
    <!-- Table of chemicals go here -->
		
	<table>
		<tr>
		  <th>Chemical ID</th>
		  <th>Chemical Name</th>
		  <th>Use Time</th>
		  <th>Quantity</th>
		  <th>Expiry Date</th>
		  <th></th>
		</tr>
		<tr>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td>Data</td>
		  <td><a href="#"><button class="arrow-button"></button></td>
		</tr>
	</table>

</body>
</html>