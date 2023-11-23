<?php
session_start();

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
      <img src="logobinder3.png" class="logo">
      <ul>
      <li class="dropdown">
      <a href="#" class="dropdown-toggle-contactus">Contact Us</a>
      <div class="dropdown-content">
                <a href="https://linktr.ee/Binder_softeng">Reservation</a>
                <a href="https://linktr.ee/Binder_softeng">Complain</a>
                <a href="https://linktr.ee/Binder_softeng">Feedback</a>
            </div>
      </li>
        <li><a href="https://youtu.be/zGb3FKVOwTY">About Us!</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggler">Explore!</a>
            <div class="dropdown-content">
                <a href="login.php">Events</a>
                <a href="login.php">Partners</a>
                <a href="login.php">Orders</a>
            </div>
        </li>    
    <li class="dropdown">
        <a href="login.php" class="dropdown-toggler">Login</a>
          <div class="dropdown-content">
            <a href="login.php">Settings</a>
            <a href="login.php">Help</a>
          </div>
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
        <button type="button"><span></span>Upload Design</button>
        <button type="button"><span></span>Buy Design</button>
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
    window.location.href = 'login.php';
  });

  // Get the upload and buy buttons by their index
  var uploadButton = document.querySelector('button:nth-of-type(1)');
  var buyButton = document.querySelector('button:nth-of-type(2)');

  // Add event listeners for click events
  uploadButton.addEventListener('click', function() {
    // Redirect to the upload page
    window.location.href = 'login.php';
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
