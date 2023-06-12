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
    <h3 class="heading-gap">Complaint Tickets Details</h3>

    <?php
        #View details of the ticket 
        if(isset($_POST["viewDetails"]))
        {
            $complaintTicketID = $_POST['complaintTicketID'];

            $ticket = new deleteStaff;
            $result = $ticket -> deleteStaff($complaintTicketID);
                
            if($result)
            {
                header("Location: staffAccountHomepage.php");
            }else{
                print_r("failed");
            }
        }

		#Assign ticket to staff
		if(isset($_POST["assignTicket"]))
		{

		}
    ?>
    <form action="assignTicketForm.php" method="POST">
        <table align="center">
            <tr>
                <td><label for="staffID">Ticket ID : </label>
                <input type='text' id="staffID" name='staffID' value='<?php echo $staffID ?>' readonly></td>
            </tr>
            <tr>
                <td><label for="staffName">Staff Name : </label>
                <input type="text" id="staffName" placeholder="Staff Name" name="staffName" value="<?php echo $staffName ?>" readonly></td>
            </tr>
            <tr>
                <td><label for="email">Email : </label>
                <input type="text" id="email" placeholder="Email" name="email" value="<?php echo $email ?>" readonly></td>
            </tr>
            <tr>
                <td><label for="password">Password : </label>
                <input type="text" id="password" placeholder="Password" name="password" value="<?php echo $password ?>" readonly></td>
            </tr>
            <tr>
                <td><label for="role">Role : </label>
                    <select id="role" name="role">
                        <option value="Admin">Admin</option>
                        <option value="Admin">Staff</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="button-container">
                    <input type="submit" name="submit" value="Edit Staff" style="border-radius: 5px;">
                    <a href="staffAccountHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>