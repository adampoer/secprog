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
      <link rel="stylesheet" href="styleaboutus.css" />  
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
                <a href="partner.php">Partners</a>
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
    </div>
        </div>
        
  <!-- Wrap the content in a container -->
  <div class="container">
    <p>
      Binder adalah sebuah platform yang dibuat untuk membantu orang membangun jaringan profesional, menjelajahi peluang pekerjaan, dan berbagi informasi terkait industri graphic designing. 
    </p>

    <h1>Goals:</h1>
    <p>
      - Menyediakan platform bagi para graphic designer untuk saling terhubung dan berinteraksi satu sama lain.
      <br>- Membantu perusahaan dalam mencari tenaga kerja di bidang graphic designing
      <br>- Menyediakan tempat bagi para designer untuk menjual karyanya
      <br>- Memungkinkan organisasi untuk mempromosikan event-event yang mereka adakan
    </p>
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
</html>
