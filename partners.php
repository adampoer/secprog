<html>
<head>
    <title>Binder! - Partners</title>
    <link rel="stylesheet" href="stylepartners.css" />
</head>

<body>
        <div class="banner">
        <div class="navbar">
        <a href="<?php echo isset($_SESSION['username']) ? 'home.php' : 'binder.php'; ?>">
        <img src="logobinder3.png" class="logo">

            <ul>
            <li><a href="myprojects.php">My Projects</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Explore!</a>
                    <div class="dropdown-content">
                        <a href="Events.php">Events</a>
                        <a href="partner.php">Partners</a>
                        <a href="orders.php">Orders</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="<?php echo isset($_SESSION['username']) ? 'home.php' : 'binder.php'; ?>">
                        <a href="logout.php" class="dropdown-toggle">logout</a>
                        <div class="dropdown-content">
                            <a href="settings.php">Settings</a>
                            <a href="myprofile.php">My Profile</a>
                            <a href="https://linktr.ee/Binder_softeng">Help</a>
                        </div>
                    </li>
                </ul>
        </div>
        
            <div class="header-container1">
                <h1>Greetings to our Partners!</h1>
            </div>
            <div class="partner-container">
                <div class="partner-card">
                    <img src="partner1.png" alt="Partner 1">
                    <h3>Partner 1</h3>
                    <p>Bina Nusantara University</p>
                </div>
                <div class="partner-card">
                    <img src="partner22.png" alt="Partner 2">
                    <h3>Partner 2</h3>
                    <p>YG ENTERTAINMENT</p>
                </div>
                <div class="partner-card">
                    <img src="partner3.png" alt="Partner 3">
                    <h3>Partner 3</h3>
                    <p>Van Gogh</p>
                </div>
                <!-- Add more partner cards as needed -->
            </div>
        </div>
    
        </div>
    </div>
    </body>
</html>

