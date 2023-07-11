<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];

        $errors = [];

        // Validate password complexity
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $newPassword)) {
            $errors[] = "New password must contain at least 8 characters, including uppercase, lowercase, digits, and special characters.";
        }

        // Check if the passwords match
        if ($newPassword !== $confirmPassword) {
            $errors[] = "Passwords do not match.";
        }

        // If there are no validation errors, proceed with password reset
        if (empty($errors)) {
            // Perform password reset logic here
            // ...
            // Redirect to success page or display success message
            header("Location: resetPasswordSuccess.php");
            exit;
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
    <link rel="stylesheet" href="resetpasswordforstaff.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'staffAccountHomepageNavbar.html';?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="container">
            <div class="rectangle-box">
                <?php if (!empty($errors)): ?>
                    <div class="error-container">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <h3 class="heading-gap">Reset Password</h3>
                <table align="center">
                    <tr>
                        <td><input type="password" placeholder="New Password" name="newPassword"></td>
                    </tr>
                    <tr>
                        <td><input type="password" placeholder="Re-enter Password" name="confirmPassword"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" style="border-radius: 5px;">Reset</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="margin-top: 10px">
                                <a href="staffAccountHomepage.php"><button type="button" style="border-radius: 5px">Back</button></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>
</html>
