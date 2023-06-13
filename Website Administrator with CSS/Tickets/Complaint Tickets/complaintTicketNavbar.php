<?php
	$staffID = $_SESSION['staffID'] ?? null;
?>

<div class="w3-bar w3-blue w3-card">
	<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
	<div class="navbar-links" style="justify-content: space-between;">
		<div style="flex-grow: 0;">
			<a href="../../Admin homepage/adminHomePage.php" class="w3-bar-item w3-button w3-padding-large">Admin</a>
		</div>
		<div style="flex-grow: 1; display: flex; justify-content: center;">
			<a href="../../Notifications/notifications.php" class="w3-bar-item w3-button w3-padding-large">Notification</a>
			<!-- <a href="ticketHomepage.php" class="w3-bar-item w3-button w3-padding-large active">Tickets</a> -->
			<div class="w3-dropdown-hover w3-hide-small">
				<button class="w3-padding-large w3-button active" title="More">Tickets<i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					<a href="complaintTicketHomepage.php" class="w3-bar-item w3-button active">Complaint Tickets</a>
					<a href="../Support Tickets/supportTicketHomepage.php" class="w3-bar-item w3-button">Support Tickets</a>
				</div>
			</div>
			<a href="../../Chemicals/chemicalHomepage.php" class="w3-bar-item w3-button w3-padding-large">Chemicals</a>
			<a href="../../Equipments/equipmentHomepage.php" class="w3-bar-item w3-button w3-padding-large">Equipments</a>
			<div class="w3-dropdown-hover w3-hide-small">
				<button class="w3-padding-large w3-button" title="More">Accounts<i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					<a href="../../Customer Accounts/customerAccountHomepage.php" class="w3-bar-item w3-button">Customer Accounts</a>
					<a href="../../Staff Accounts/staffAccountHomepage.php" class="w3-bar-item w3-button">Staff Accounts</a>
				</div>
			</div>
		</div>
		<div class="w3-dropdown-hover w3-hide-small">
			<img src="../../Account setting/upload/<?php echo $img_name; ?>" width="40" height="40" title="<?php echo $img_name; ?>" style="border-radius: 50%; cursor:pointer; margin-left:6px;">
			<button class="w3-padding-large w3-button" title="More" style="width:1px;"><i class="fa">&#8942;</i></button>
			<div class="w3-dropdown-content w3-bar-block w3-card-4" style="right:1px;">
				<a href="../Account setting/AccountSetting.php" class="w3-bar-item w3-button">Account settings</a>
				<a href="../LoginBoundary.php" class="w3-bar-item w3-button">Log out</a>
			</div>
		</div>
	</div>
</div>