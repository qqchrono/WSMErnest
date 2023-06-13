<?php
	$staffID = $_SESSION['staffID'] ?? null;
	$dbData = $staffController->retrieveDataFromDatabase($staffID);
	$img_name = $dbData['imageName'];
?>

<div class="w3-bar w3-blue w3-card">
	<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
	<div class="navbar-links" style="justify-content: space-between;">
		<div style="flex-grow: 0;">
			<a href="../Admin homepage/adminHomePage.php" class="w3-bar-item w3-button w3-padding-large">Admin</a>
		</div>
		<div style="flex-grow: 1; display: flex; justify-content: center;">
			<a href="../Notifications/notifications.php" class="w3-bar-item w3-button w3-padding-large">Notification</a>
			<div class="w3-dropdown-hover w3-hide-small">
				<button class="w3-padding-large w3-button" title="More">Tickets<i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					<a href="../Tickets/Complaint Tickets/complaintTicketHomepage.php" class="w3-bar-item w3-button">Complaint Tickets</a>
					<a href="../Tickets/Support Tickets/supportTicketHomepage.php" class="w3-bar-item w3-button">Support Tickets</a>
				</div>
			</div>
			<a href="../Chemicals/chemicalHomepage.php" class="w3-bar-item w3-button w3-padding-large">Chemicals</a>
			<a href="../Equipments/equipmentHomepage.php" class="w3-bar-item w3-button w3-padding-large">Equipments</a>
			<div class="w3-dropdown-hover w3-hide-small">
				<button class="w3-padding-large w3-button" title="More">Accounts<i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					<a href="../Customer Accounts/customerAccountHomepage.php" class="w3-bar-item w3-button">Customer Accounts</a>
					<a href="../Staff Accounts/staffAccountHomepage.php" class="w3-bar-item w3-button">Staff Accounts</a>
				</div>
			</div>
		</div>
		<div class="w3-dropdown-hover w3-hide-small">
			<img src="../Account setting/upload/<?php echo $img_name; ?>" width="40" height="40" title="<?php echo $img_name; ?>" style="border-radius: 50%;">
			<button class="w3-padding-large w3-button" title="More" style="width:1px;"><i class="fa">&#8942;</i></button>
			<div class="w3-dropdown-content w3-bar-block w3-card-4" style="right:1px;">
				<a href="../Account setting/AccountSetting.php" class="w3-bar-item w3-button active">Account settings</a>
				<a href="../LoginBoundary.php" class="w3-bar-item w3-button">Log out</a>
			</div>
		</div>
	</div>
</div>