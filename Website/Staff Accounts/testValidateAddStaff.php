<?php
    include 'addStaffController.php';

    $errors = [];

    if (isset($_POST["submit"])) {
        $staffName = $_POST["staffName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        // Validate staff name
        if (empty($staffName)) {
            $errors[] = "Staff name is required.";
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        // Validate password complexity
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            $errors[] = "Password must contain at least 8 characters, including uppercase, lowercase, digits, and special characters.";
        }

        // If there are no validation errors, proceed to add staff
        if (empty($errors)) {
            $inputdata = [$staffName, $email, $password, $role];

            $staff = new addStaff;
            $result = $staff->addStaff($inputdata);

            if ($result) {
                header("Location: staffAccountHomepage.php");
                exit;
            } else {
                $errors[] = "Failed to add staff.";
            }
        }
    }
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
  <link rel="stylesheet" href="staff.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'staffAccountHomepageNavbar.html';?>

    <form action="addStaff.php" method="POST">
        <h3 class="heading-gap">Add Staff</h3>

        <div class="container">
            <div class="rectangle-box">
                <?php if (!empty($errors)): ?>
                    <div class="error-message">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <table align="center">
                    <tr>
                        <td>
                            <label for="staffName">Staff Name:</label>
                            <input type="text" id="staffName" placeholder="Staff Name" name="staffName" value="<?php echo isset($staffName) ? $staffName : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                            <input type="text" id="email" placeholder="Email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Password:</label>
                            <input type="password" id="password" placeholder="Password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="role">Role:</label>
                            <select id="role" name="role">
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="button-container">
                            <input type="submit" name="submit" value="Add Staff" style="border-radius: 5px;">
                            <a href="staffAccountHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>
</html>
