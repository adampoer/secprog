<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: binder.php");
    exit();
}

// Check if an uploaded file exists in the session
if (isset($_SESSION['uploadedFile'])) {
    // Retrieve the uploaded filename from the session
    $filename = $_SESSION['uploadedFile'];
    // Clear the session variable
    unset($_SESSION['uploadedFile']);
} else {
    // Default filename if no uploaded file is available
    $filename = "your_uploaded_file.jpg";
}
?>

<html>
<head>
    <title>Binder! - My Projects</title>
    <link rel="stylesheet" href="styleorders.css" />
    <script src="scripthome.js"></script>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <a href="<?php echo isset($_SESSION['username']) ? 'home.php' : 'binder.php'; ?>">
                <img src="logobinder3.png" class="logo">
            </a>
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
                        <a href="logout.php" class="dropdown-toggle">Logout</a>
                        <div class="dropdown-content">
                            <a href="settings.php">Settings</a>
                            <a href="myprofile.php">My Profile</a>
                            <a href="https://linktr.ee/Binder_softeng">Help</a>
                        </div>
                    </li>
                </ul>   
            </div>
            <div class="header-container1">
                <h1>Track Your Orders!</h1>
                <p>Current Status: No Order Found</p> 
            </div>
         
            <div class="container">
        <h1>Order Tracking</h1>

        <div class="milestone-line">
            <div class="milestone">Order Placed</div>
            <div class="milestone">Processing</div>
            <div class="milestone">Received</div>
            <div class="line"></div>
        </div>

        
    </div>
    
    
    </div>




    
    <!-- <div class="footer-buttons">
            <button>Sell Design</button>
            <button>Get Link</button>
        </div> -->
    <script>
        // Get the login link by its index
        var loginLink = document.querySelector('.navbar ul li:nth-child(3) a');

        // Add event listener for click event
        loginLink.addEventListener('click', function(event) {
            // Prevent the default link behavior
            event.preventDefault();

            // Redirect to the login page
            window.location.href = 'logout.php';
        });

        // Dropdown menu functionality
        var dropdown = document.querySelector('.dropdown');
        var dropdownContent = dropdown.querySelector('.dropdown-content');

        dropdown.addEventListener("mouseover", function() {
            dropdownContent.style.display = "block";
        });

        dropdown.addEventListener("mouseout", function() {
            dropdownContent.style.display = "none";
        });
    </script>
</body>
</html>
