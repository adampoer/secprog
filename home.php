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

// Check if the myprojects button is clicked
if (isset($_GET["myprojects"])) {
    // Redirect to myprojects.php
    header("Location: myprojects.php");
    exit;
}
?>

<head>
    <title>Binder!</title>
    <link rel="stylesheet" href="stylehomee.css" />
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
                        <a href="partners.php">Partners</a>
                        <a href="orders.php">Orders</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="logout.php" class="dropdown-toggle">Logout</a>
                    <div class="dropdown-content">
                        <a href="settings.php">Settings</a>
                        <a href="myprofile.php">My Profile</a>
                        <a href="https://linktr.ee/Binder_softeng">Help</a>
                    </div>
                </li>
                <li class="search">
                    <form action="search.php" method="GET">
                        <input type="text" name="query" placeholder="Search...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="slideshow">
            <img src="slide1.jpg" class="img-content" />
            <img src="slide2.jpg" class="img-content" />
            <img src="slide3.jpg" class="img-content" />
            <img src="slide4.jpg" class="img-content" />
            </div>
        <div class="content">
            <h1>VISUALIZE YOUR CREATIVE DESIGN</h1>
            <p>Check our amazing creation from creative people from all over the world!<br>Start Your Journey With Us ^__^</p>
            <div>
            <button type="button" onclick="window.open('https://linktr.ee/Binder_softeng', '_blank')"><span></span>Hotline Service</button>
                <button type="button"><span></span>Upload Design</button>
                <button type="button"><span></span>Buy Design</button>
            </div>
        </div>

        <div class="content1">
            <h1>About Us!</h1>
        </div>

        <div class="video-container">
        <iframe src="https://www.youtube.com/embed/lrt8R-kXieEssxs" frameborder="0" allowfullscreen></iframe>
         </div>
    </div>
            </div>
        </div>
</body>

<script>
    // JavaScript code goes here

    // Get the login link by its index
    var loginLink = document.querySelector('.navbar ul li:nth-child(3) a');

    // Add event listener for click event
    loginLink.addEventListener('click', function(event) {
        // Prevent the default link behavior
        event.preventDefault();

        // Redirect to the login page
        window.location.href = 'logout.php';
    });

    // Get the upload and buy buttons by their index
    var uploadButton = document.querySelector('button:nth-of-type(2)');
    var buyButton = document.querySelector('button:nth-of-type(3)');

    // Add event listeners for click events
    uploadButton.addEventListener('click', function() {
        // Redirect to the upload page
        window.location.href = 'upload.php';
    });

    buyButton.addEventListener('click', function() {
        // Redirect to the buy page
        window.location.href = 'buy.php';
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

    // Toggle hotline popup
    function toggleHotlinePopup() {
        var hotlinePopup = document.getElementById('hotlinePopup');
        hotlinePopup.classList.toggle('show');
    }

    // Get the slideshow container
    var slideshowContainer = document.querySelector('.slideshow');

    // Get all the images inside the slideshow
    var slideshowImages = Array.from(slideshowContainer.getElementsByTagName('img'));

    // Set the first image as active
    slideshowImages[0].classList.add('active');

    // Start the slideshow
    var currentIndex = 0;
    var interval = setInterval(function() {
        // Remove active class from current image
        slideshowImages[currentIndex].classList.remove('active');

        // Increment the index or go back to the beginning
        currentIndex = (currentIndex + 1) % slideshowImages.length;

        // Add active class to the next image
        slideshowImages[currentIndex].classList.add('active');
    }, 2000); // Adjust the interval (in milliseconds) between each image transition
</script>

</html>
