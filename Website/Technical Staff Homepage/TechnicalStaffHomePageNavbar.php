<?php
	$staffID = $_SESSION['staffID'] ?? null;

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header("Location: ../LoginBoundary.php");
		exit();
	}
?>

<div class="w3-bar w3-blue w3-card">
	<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
	<div class="navbar-links" style="justify-content: space-between;">
		<div style="flex-grow: 0;">
			<a href="../Admin homepage/adminHomePage.php" class="w3-bar-item w3-button w3-padding-large active">Staff</a>
		</div>
		<div style="flex-grow: 1; display: flex; justify-content: center;">
			<a href="../Tickets/Complaint Tickets/complaintTicketHomepage.php" class="w3-bar-item w3-button w3-padding-large">Assigned Tickets</a>
			<a href="../Chemicals/chemicalHomepage.php" class="w3-bar-item w3-button w3-padding-large">Chemicals</a>
			<a href="../Equipments/equipmentHomepage.php" class="w3-bar-item w3-button w3-padding-large">Equipments</a>
			<a href="../Tickets/Complaint Tickets/waterusage.php" class="w3-bar-item w3-button w3-padding-large">Water usage</a>
		</div>
		<div class="w3-dropdown-hover w3-hide-small">
			<img src="../Account setting/upload/<?php echo $img_name; ?>" width="40" height="40" title="<?php echo $img_name; ?>" style="border-radius: 50%; cursor:pointer; margin-left:6px;">
			<button class="w3-padding-large w3-button" title="More" style="width:1px;"><i class="fa">&#8942;</i></button>
			<div class="w3-dropdown-content w3-bar-block w3-card-4" style="right:1px;">
				<a href="../Account setting/AccountSetting.php" class="w3-bar-item w3-button">Account settings</a>
				<form method="post" action="">
					<button type="submit" name="logout" class="w3-bar-item w3-button" style="width:100%;">Log out</button>
				</form>
			</div>
		</div>
	</div>
</div>