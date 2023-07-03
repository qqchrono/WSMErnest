<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<head>
    <meta charset="UTF-8">
    <title>Hyrogrid: Simplify Your Water Supply Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #005c99;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        nav {
            background-color: #005c99;
            color: #fff;
            padding: 10px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        li {
            margin: 0 10px;
        }

        li a {
            color: #fff;
            text-decoration: none;
        }

        li a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-top: 40px;
        }

        p {
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .feature {
            width: 50%;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .feature:nth-child(even) {
            background-color: #f2f2f2;
        }

        .feature:nth-child(odd) {
            background-color: #e6f2ff;
        }

        .feature h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .feature p {
            margin-bottom: 0;
        }

        .cta-button {
            display: inline-block;
            background-color: #005c99;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .our-tech {
            background-color: #f2f2f2;
            padding: 40px;
            border-radius: 10px;
            margin-top: 40px;
        }

        .our-tech h2 {
            margin-bottom: 20px;
        }

        .our-tech p {
            margin-bottom: 20px;
        }

        footer {
            background-color: #005c99;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        #home {
        background-color: #f2f2f2;
        }
        .our-tech ul {
            list-style-type: none;
            padding: 0;
        }

        .our-tech li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 10px;
        }

        .our-tech li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 5px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #005c99;
        }
        .icon {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <header>
        <img class="logo" src="https://example.com/a.png" alt="Hyrogrid Logo">
        <h1>Hyrogrid: Simplify Your Water Supply Management</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#subscription-list">Subscription List</a></li>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#login">Login</a></li>
        </ul>
    </nav>

    <div class="container" id="home">
        <h2>Welcome to Hyrogrid!</h2>
      
    </div>

    <div class="container" id="our-technology">
        <div class="our-tech">
            <h2>Our Technology</h2>
            <p>HydroGrid harnesses the power of advanced technology to deliver a comprehensive digital water management solution. We are a catalyst for change, driving innovation, and promoting a more sustainable future. With our comprehensive platform, passionate team, and commitment to excellence, we are revolutionizing the way water is managed, one drop at a time. Join us on this transformative journey and be a part of the HydroGrid community, where water management meets technology for a greener world.</p>
            <div class="container" id="list">
            <ul>
                <li><i class="fas fa-chart-line icon"></i>Web-based tools</li>
                <li><i class="fas fa-wifi icon"></i>Mobile Application</li>
                <li><i class="fas fa-chart-bar icon"></i>Inventory Control with Logs </li>
                <li><i class="fas fa-bell icon"></i>Effortless Water Management</li>
                <li><i class="fas fa-map-marker-alt icon"></i>Automation</li>
                <li><i class="fas fa-map-marker-alt icon"></i>User Access Control</li>
            </ul>
            </div>
        </div>
    </div>

    <div class="container" id="features">
        <h2>Why Choose Hyrogrid?</h2>
        <div class="features">
            <div class="feature">
                <h3 class="highlight-blue">Effortless Water Management</h3>
                <p>With Hyrogrid, managing your water supply becomes a breeze. Our intuitive interface and user-friendly features simplify the process, allowing you to focus on other important tasks.</p>
            </div>
            <div class="feature">
                <h3 class="highlight-orange">Mobile Application</h3>
                <p>Our customer mobile app provides a seamless experience for end-users, enabling them to receive bills, submit support tickets, and stay informed about their water usage on the go.</p>
            </div>
            <div class="feature">
                <h3 class="highlight-blue">Inventory Control with Logs</h3>
                <p>Hydrogrid features a robust database to keep track of all your equipment and chemicals used. Any update on the inventory will be reflected in the logs to aduiting</p>
            </div>
            <div class="feature">
                <h3 class="highlight-orange">Billing and Invoicing</h3>
                <p>Simplify your billing process with Hydrogrid's automated invoicing system, accurately tracking usage and generating invoices for your customers.</p>
            </div>
        </div>
    </div>


    <div class="container" id="subscription-list">
        <h2>Subscription List</h2>
        <p>Check out our available subscription plans:</p>
        <!-- Add subscription list content here -->
    </div>

    <div class="container" id="about-us">
        <h2>About Us</h2>
        <p>Learn more about Hydrogrid and our mission:</p>
        <!-- Add about us content here -->
    </div>

    

    <footer>
        &copy; 2023 Hyrogrid. All rights reserved. | Contact: <a href="mailto:info@Hyrogrid.com">info@Hyrogrid.com</a> | Phone:+659999999
    </footer>
</body>

</html>
