<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #005c99;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004d80;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="company-name">Company Name:</label>
            <input type="text" id="company-name" name="company-name" required>

            <label for="company-address">Company Address:</label>
            <input type="text" id="company-address" name="company-address" required>

            <label for="company-uen">Company UEN:</label>
            <input type="text" id="company-uen" name="company-uen" required>

            <label for="subscription-type">Subscription Type:</label>
            <br>
            <input type="radio" id="first-month-free" name="subscription-type" value="first-month-free" required>
            <label for="first-month-free">First Month Free Trial</label>
            <br>
            <input type="radio" id="monthly" name="subscription-type" value="monthly">
            <label for="monthly">Monthly</label>
            <br>
            <input type="radio" id="semiannual" name="subscription-type" value="semiannual">
            <label for="semiannual">Semiannual</label>
            <br>
            <input type="radio" id="annually" name="subscription-type" value="annually">
            <label for="annually">Annually</label>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>