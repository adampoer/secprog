<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["username"])) {
    // Check if the logout link is clicked
    if (isset($_GET["logout"])) {
        // Clear the session data
        session_unset();
        session_destroy();

        // Redirect to logout.php
        header("Location: logout.php");
        exit;
    }
} else {
    // Redirect to login.php if the user is not logged in
    header("Location: login.php");
    exit;
}
?>

<html>
<head>
    <title>Binder!</title>
    <link rel="stylesheet" href="styleevent.css"/>
    <script src="scripthome.js"></script>
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
</div>

<div class="container">
    <h2>Ongoing Events</h2>
    <ul class="event-list">
        <li>
            <div class="event">
                <a href="event1.php">
                    <h3>ARTISTIX</h3>
                    <p>Art Exhibition LA07</p>
                    <p>Bina Nusantara University</p>
                    <p>Date: 2023-06-10</p>
                </a>
            </div>
        </li>
        <li>
            <div class="event">
                <a href="event1.php">
                    <h3>BLACKPINK EXHIBITION</h3>
                    <p>First Exhibition in Asia, BLACKPINK!</p>
                    <p>YG ENTERTAINMENT</p>
                    <p>Date: 2023-06-15</p>
                </a>
            </div>
        </li>
    </ul>
</div>

<div class="container2">
    <h2>Upcoming Events</h2>
    <ul class="event-list">
        <li>
            <div class="event">
                <!-- <a href="event1.php">
                  <h3>Event 3</h3>
                  <p>Description of Event 3</p>
                  <p>Date: 2023-06-20</p>
                </a> -->
            </div>
        </li>
        <li>
            <div class="event">
                <!-- <a href="event1.php">
                  <h3>Event 4</h3>
                  <p>Description of Event 4</p>
                  <p>Date: 2023-06-25</p>
                </a> -->
            </div>
        </li>
    </ul>
</div>

</body>

<script>
    // JavaScript code goes here

    // Get the login link by its index
    var loginLink = document.querySelector('.navbar ul li:nth-child(3) a');

    // Add event listener for click event
    loginLink.addEventListener('click', function (event) {
        // Prevent the default link behavior
        event.preventDefault();

        // Redirect to the login page
        // window.location.href = 'logout.php';
    });

    // Dropdown menu functionality
    var dropdown = document.querySelector('.dropdown');
    var dropdownContent = dropdown.querySelector('.dropdown-content');

    dropdown.addEventListener("mouseover", function () {
        dropdownContent.style.display = "block";
    });

    dropdown.addEventListener("mouseout", function () {
        dropdownContent.style.display = "none";
    });
</script>

</html>
