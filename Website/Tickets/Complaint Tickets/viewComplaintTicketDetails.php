<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path2 = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Complaint Tickets/Controllers/resolveTicketController.php";
    include_once $path2 . "/Water-Supply-Management/Website Administrator with CSS/Tickets/Complaint Tickets/Controllers/viewComplaintTicketDetailsController.php";
    
	include '../../Account setting/AccountSettingController.php';
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
    <link rel="stylesheet" href="viewComplaintTicketDetails.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'complaintTicketNavbar.php';?>
    <h3 class="heading-gap">Complaint Tickets Details</h3>

    <?php
        #View details of the ticket 
        $hiddenStaffID = ''; 
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
                    $hiddenStaffID = $row['staffID'];
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
            $hiddenStaffID = $_POST['staffID'];
            if ($hiddenStaffID == $_SESSION['staffID'])
            {
                $ticket = new resolveTicket;
                $result = $ticket -> resolveTicket($complaintTicketID);
                    
                if($result)
                {
                    echo "<SCRIPT>
                    window.location.replace('complaintTicketHomepage.php');
    	            </SCRIPT>";
                }else{
                    print_r('failed');
                }
            }
        
        }

        if ($_SESSION['accountRole'] == 'Admin')
        {
        ?>
            <form action="assignTicketForm.php" method="POST">
                <div class="form-row">
                    <label for="complaintTicketID">Ticket ID : </label>
                    <div class="form-value"><?php echo $complaintTicketID ?></div>
                </div>
                <div class="form-row">
                    <label for="customerName">Customer Name : </label>
                    <div class="form-value"><?php echo $customerName ?></div>
                </div>
                <div class="form-row">
                    <label for="staffName">Staff Name : </label>
                    <div class="form-value"><?php echo $staffName ?></div>
                </div>
                <div class="form-row">
                    <label for="ticketStatus">Ticket Status : </label>
                    <div class="form-value"><?php echo $ticketStatus ?></div>
                </div>
                <div class="form-row">
                    <label for="details">Details : </label>
                    <div class="form-value"><?php echo $details ?></div>
                </div>
                <div class="form-row">
                    <label for="time_of_issue">Time of issue : </label>
                    <div class="form-value"><?php echo $timeOfIssue ?></div>
                </div>
                <div class="form-row">
                    <label for="time_of_resolution">Time of resolution : </label>
                    <div class="form-value"><?php echo $timeOfResolution ?></div>
                </div>
                <div class="button-container">
                    <input type='hidden' name='complaintTicketID' value='<?php echo $complaintTicketID ?>'>
                    <input type="submit" name="assignTicket" value="Assign Ticket" style="border-radius: 5px;">
                    <a href="complaintTicketHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                </div>
            </form>
    <?php
        }
        else if ($_SESSION['accountRole'] =='Staff')
        {
        ?>
            <form action="viewComplaintTicketDetails.php" method="POST">
            <div class="form-row">
                    <label for="complaintTicketID">Ticket ID : </label>
                    <div class="form-value"><?php echo $complaintTicketID ?></div>
                </div>
                <div class="form-row">
                    <label for="customerName">Customer Name : </label>
                    <div class="form-value"><?php echo $customerName ?></div>
                </div>
                <div class="form-row">
                    <label for="staffName">Staff Name : </label>
                    <div class="form-value"><?php echo $staffName ?></div>
                </div>
                <div class="form-row">
                    <label for="ticketStatus">Ticket Status : </label>
                    <div class="form-value"><?php echo $ticketStatus ?></div>
                </div>
                <div class="form-row">
                    <label for="details">Details : </label>
                    <div class="form-value"><?php echo $details ?></div>
                </div>
                <div class="form-row">
                    <label for="time_of_issue">Time of issue : </label>
                    <div class="form-value"><?php echo $timeOfIssue ?></div>
                </div>
                <div class="form-row">
                    <label for="time_of_resolution">Time of resolution : </label>
                    <div class="form-value"><?php echo $timeOfResolution ?></div>
                </div>
                    <div class="button-container">
                        <input type='hidden' name='staffID' value='<?php echo $hiddenStaffID ?>'>
                        <input type='hidden' name='complaintTicketID' value='<?php echo $complaintTicketID ?>'>
                        <input type="submit" name="resolveTicket" value="Resolve Ticket" style="border-radius: 5px;">
                        <a href="complaintTicketHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                    </div>
            </form>
        <?php
        }
    ?>

</body>
</html>