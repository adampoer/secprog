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
      <link rel="stylesheet" href="stylemyprojects.css" />  
      <script src = "scripthome.js"></script>
    </head>

<body>

    <div class="banner">
    <div class="navbar">
        <img src="logobinder3.png" class="logo">
        <ul>
                    <li><a href="#">My Projects</a></li>
                    <li><a href="#">Explore!</a></li>
                    <li><a href="?logout=true">Logout</a></li>
        </ul>


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
            window.location.href = 'logout.php  ';
        });
    
        // Get the upload and buy buttons by their index
        var uploadButton = document.querySelector('button:nth-of-type(1)');
        var buyButton = document.querySelector('button:nth-of-type(2)');
    
        // Add event listeners for click events
        uploadButton.addEventListener('click', function() {
            // Redirect to the upload page
            window.location.href = 'upload.php';
        });
    
        buyButton.addEventListener('click', function() {
            // Redirect to the buy page
            window.location.href = 'buy.php';
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
    
      
</body>
</html>