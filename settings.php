<!-- settings.php -->

<?php
session_start();

// Check if the logout link is clicked
if (isset($_GET["logout"])) {
  // Clear the session data
  session_unset();
  session_destroy();

  // Redirect to logout.php
  header("Location: logout.php");
  exit;
}

// Check if the user is logged in
if (isset($_SESSION["username"])) {
  $homePage = "home.php";
} else {
  $homePage = "binder.php";
}
?>

<html>
  <head>
    <title>Binder! - Settings</title>
    <link rel="stylesheet" href="stylesettings.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        // Handle sidebar link clicks
        $(".sideb-a").click(function(e) {
          e.preventDefault(); // Prevent the default link behavior
          var page = $(this).attr("href"); // Get the target page from the link's href attribute

          // Load the page content using AJAX
          $.ajax({
            url: page,
            success: function(response) {
              $("#content").html(response); // Update the content section with the loaded content
            }
          });
        });
      });
    </script>
  </head>

  <body>
    <div class="banner"></div>

    <div class="sidebar">
      <a href="<?php echo $homePage; ?>">
        <img src="logobinder3.png" class="logo">
      </a>
      <ul>
        <li><a href="accountandpriv.php" class="sideb-a">Account</a></li>
        <li><a href="privacy.php" class="sideb-a">Privacy</a></li>
        <li><a href="terms.php" class="sideb-a">T&C</a></li>
        <li><a href="security.php" class="sideb-a">Security</a></li>
        <li><a href="language.php" class="sideb-a">Language</a></li>
        <li><a href="#" class="sideb-a">Payment Info</a></li>
        <li><a href="socmed.php" class="sideb-a">Social Media Connect</a></li>  
      </ul>
    </div>

    <div id="content">
      <!-- Default content or initial content of the settings page -->
    </div>

  </body>
</html>
