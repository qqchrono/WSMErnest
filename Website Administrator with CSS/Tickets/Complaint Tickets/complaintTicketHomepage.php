<?php
	include 'viewComplaintTicketController.php';
    session_start();

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
  <link rel="stylesheet" href="../ticketHomepage.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'complaintTicketNavbar.html';?>
	
    <h3 class="heading-gap">Complaint Tickets</h3>

	<div class="search-container">
        <form action="/action_page.php"><!-- php file placeholder for now -->
            <input type="text" placeholder="Search..." name="search">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <!-- Table of tickets go here -->
	<div class = "tableScroll">
        <table>
            <tr>
				<th>Ticket ID</th>
				<th>Customer Name</th>
				<th>Staff Name</th>
				<th>Status</th>
				<th>Details</th>
				<th>Time of Issue</th>
				<th>Time of Resolution</th>
				<th colspan="2"></th>
        	</tr>

        <?php 
            $ticket = new complaintTicketView;
            $result = $ticket -> getData();
            if($result)
            {
                foreach($result as $row)
                {
        ?>

        <tr>
            <td><?php echo $row['complaintTicketID'] ?></td>
            <td><?php echo $row['customerName'] ?></td>
            <td><?php echo $row['staffName'] ?></td>
            <td><?php echo $row['ticketStatus'] ?></td>
            <td><div class="details"><?php echo $row['details'] ?></div></td>
            <td><?php echo $row['time_of_issue'] ?></td>
            <td><?php echo $row['time_of_resolution'] ?></td>
			<td><button>Assign</button></td> <!-- Assign not done yet -->
            <td>
                <form action='viewComplaintTicketDetails.php' method="POST">
                    <input type='hidden' name='complaintTicketID' value='<?php echo $row['complaintTicketID']?>'>
                    <input type='submit' name='viewDetails' value='View Details'>
                </form> 
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