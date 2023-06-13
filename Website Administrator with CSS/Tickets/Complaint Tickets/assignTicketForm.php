<?php
	include 'assignTicketController.php';
    include '../../Staff Accounts/viewStaffController.php';
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
    <h3 class="heading-gap">Choose staff to assign ticket to</h3>

    <?php
        $complaintTicketID = '';
        if(isset($_POST["assignTicket"]))
        {
            $complaintTicketID =$_POST['complaintTicketID'];
        }

        #Assign ticket to the staff
        if(isset($_POST["submit"]))
        {
            $inputdata = [
                $complaintTicketID = $_POST['complaintTicketID'],
                $staffID = $_POST['staffID']
            ];

            $ticket = new assignTicket;
            $result = $ticket -> assignTicket($inputdata);
                
            if($result)
            {
                header("Location: complaintTicketHomepage.php");
            }else{
                print_r("failed");
            }
        }
    ?>
    <div class = "tableScroll">
        <table>
            <tr>
            <th></th>
            <th>Staff ID</th>
            <th>Staff Name</th>
            <th>Status</th>
            <th></th>
        </tr>

        <?php 
            $staff = new staffView;
            $result = $staff -> getData();
            if($result)
            {
                foreach($result as $row)
                {
        ?>
        <form action="assignTicketForm.php" method="POST">
            <table>
                <td>
                    <!-- Picture here -->
                </td>
                <td>
                    <input type='text' id="staffID" name='staffID' value='<?php echo $row['staffID'] ?>' readonly></td>
                </td>
                <td>
                    <input type="text" id="staffName" value="<?php echo $row['staffName'] ?>" readonly></td>
                </td>
                <td>
                    <input type="text" id="status" value="<?php echo $row['status'] ?>" readonly></td>
                </td>
                <td>
                    <td class="button-container">
                        <input type='hidden' id="complaintTicketID" name='complaintTicketID' value='<?php echo $complaintTicketID ?>'>
                        <input type="submit" name="submit" value="Assign Ticket" style="border-radius: 5px;">
                        <a href="complaintTicketHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                    </td>
                </td>
            </table>
        </form>
        <?php
                }
            }
        ?>
        
      </table>
    </div>

</body>
</html>