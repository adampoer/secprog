<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to login.php if the user is not logged in
    header("Location: login.php");
    exit;
}
?>

<html>
<head>
    <title>Binder! - Event 1</title>
    <link rel="stylesheet" href="stylevent1.css"/>
</head>

<body>

<div class="banner">
    <div class="navbar">
        <a href="home.php">
            <img src="logobinder3.png" class="logo">
            <ul>
                <li><a href="myprojects.php">My Projects</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Explore!</a>
                    <div class="dropdown-content">
                        <a href="Events.php">Events</a>
                        <a href="partners.php">Partners</a>
                        <a href="orders.php">Orders</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="logout.php" class="dropdown-toggle">Logout</a>
                    <div class="dropdown-content">
                        <a href="settings.php">Settings</a>
                        <a href="myprofile.php">My Profile</a>
                        <a href="help.php">Help</a>
                    </div>
                </li>
            </ul>
        </a>
    </div>
    <div class="container">
    <h2>Artistix</h2>
    <div class="event-content">
        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRQBAjz8U_7xU8Ry38SRN34aZwJ_tLu72BK7VWdjy7Gz6G_znVLMGZac7bDcAZDjhfffKcE5rSwR1Wr/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
    </div>
</div>
</div>



</body>
</html>
