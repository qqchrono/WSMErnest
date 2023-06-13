<?php
	include 'viewComplaintTicketDetailsController.php';
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
    <h3 class="heading-gap">Complaint Tickets Details</h3>

    <?php
        #View details of the ticket 

        $complaintTicketID = '';
        $customerName = '';
        $staffName = '';
        $ticketStatus = '';
        $details = '';
        $timeOfIssue = '';
        $timeOfResolution = '';

        if(isset($_POST["viewDetails"]))
        {
            $complaintTicketID = $_POST['complaintTicketID'];

            $ticket = new complaintTicketDetailView;
            $result = $ticket -> viewTicketDetails($complaintTicketID);
                
            if($result)
            {
                foreach($result as $row)
                {
                    $complaintTicketID = $row['complaintTicketID'];
                    $customerName = $row['customerName'];
                    $staffName = $row['staffName'];
                    $ticketStatus = $row['ticketStatus'];
                    $details = $row['details'];
                    $timeOfIssue = $row['time_of_issue'];
                    $timeOfResolution = $row['time_of_resolution'];
                }
            }else{
                print_r("failed");
            }
        }

        if(isset($_POST["resolveTicket"]))
        {
            $complaintTicketID = $_POST['complaintTicketID'];
            $staffID = $_POST['staffID'];
            if ($staffID == $_SESSION['staffID'])
            {
                $ticket = new complaintTicketDetailView;
                $result = $ticket -> viewTicketDetails($complaintTicketID);
                    
                if($result)
                {
                    foreach($result as $row)
                    {
                        $complaintTicketID = $row['complaintTicketID'];
                        $customerName = $row['customerName'];
                        $staffName = $row['staffName'];
                        $ticketStatus = $row['ticketStatus'];
                        $details = $row['details'];
                        $timeOfIssue = $row['time_of_issue'];
                        $timeOfResolution = $row['time_of_resolution'];
                    }
                }else{
                    print_r("failed");
                }
            }
        
        }

        if ($_SESSION['accountRole'] == 'Admin')
        {
        ?>
            <form action="assignTicketForm.php" method="POST">
                <table>
                    <tr>
                        <td><label for="complaintTicketID">Ticket ID : </label>
                        <input type='text' id="complaintTicketID" name='complaintTicketID' value='<?php echo $complaintTicketID ?>' readonly></td>
                    </tr>
                    <tr>
                        <td><label for="customerName">Customer Name : </label>
                        <input type="text" id="customerName" value="<?php echo $customerName ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="staffName">Staff Name : </label>
                        <input type="text" id="staffName" value="<?php echo $staffName ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="ticketStatus">Ticket Status : </label>
                        <input type="text" id="ticketStatus" value="<?php echo $ticketStatus ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="details">Details : </label>
                        <input type="text" id="details" value="<?php echo $details ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="time_of_issue">Time of issue : </label>
                        <input type="text" id="time_of_issue" value="<?php echo $timeOfIssue ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="time_of_resolution">Time of resolution : </label>
                        <input type="text" id="time_of_resolution" value="<?php echo $timeOfResolution ?>" readonly></td>
                    </tr>
                    <tr>
                        <td class="button-container">
                            <input type="submit" name="assignTicket" value="Assign Ticket" style="border-radius: 5px;">
                            <a href="complaintTicketHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                        </td>
                    </tr>
                </table>
            </form>
    <?php
        }
        else if ($_SESSION['accountRole'] =='Staff')
        {
        ?>
            <form action="viewComplaintTicketDetails.php" method="POST">
                <table>
                    <tr>
                        <td><label for="complaintTicketID">Ticket ID : </label>
                        <input type='text' id="complaintTicketID" name='complaintTicketID' value='<?php echo $complaintTicketID ?>' readonly></td>
                    </tr>
                    <tr>
                        <td><label for="customerName">Customer Name : </label>
                        <input type="text" id="customerName" value="<?php echo $customerName ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="staffName">Staff Name : </label>
                        <input type="text" name = 'staffID' id="staffName" value="<?php echo $staffName ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="ticketStatus">Ticket Status : </label>
                        <input type="text" id="ticketStatus" value="<?php echo $ticketStatus ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="details">Details : </label>
                        <input type="text" id="details" value="<?php echo $details ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="time_of_issue">Time of issue : </label>
                        <input type="text" id="time_of_issue" value="<?php echo $timeOfIssue ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="time_of_resolution">Time of resolution : </label>
                        <input type="text" id="time_of_resolution" value="<?php echo $timeOfResolution ?>" readonly></td>
                    </tr>
                    <tr>
                        <td class="button-container">
                            <input type="submit" name="resolveTicket" value="Resolve Ticket" style="border-radius: 5px;">
                            <a href="complaintTicketHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        <?php
        }
    ?>

</body>
</html>