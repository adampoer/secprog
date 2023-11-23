<?php
// require_once 'db_config.php';
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: Validate the username and password (e.g., check against a database)

    // For demonstration purposes, let's assume the username and password are valid
    // You would typically perform database queries and validations here

    // Set the user's session information
    $_SESSION['username'] = $username;

    // Redirect the user to the appropriate page after successful login
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Binder - Login</title>
  <link rel="stylesheet" href="backupstylelogin.css" />
</head>
<body>
  <section class='login' id='login'>
    <div class='head'>
      <a href="<?php echo isset($_SESSION['username']) ? 'home.php' : 'binder.php'; ?>">
        <img src="logobinder3.png" class="logoo">
      </a>
      <a href="register.php" class='Register'>Register</a>
    </div>
    <p class='msg'>Welcome to Binder!</p>
    <div class='form'>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" placeholder='Username' name="username" class='text' id='username' required><br>
        <input type="password" placeholder='•••••••••' name="password" class='password'><br>
        <button type="submit" class='btn-login' id='do-login'>Login</button>
        <a href="forgot.php" class='forgot'>Forgot?</a>
        <p class='footermsg'>Don't have an account? <a href="register.php">Register Here!</a></p>
        <?php if (isset($errorMessage)) { ?>
            <p><?php echo $errorMessage; ?></p>
        <?php } ?>
      </form>
    </div>
  </section>
</body>
</html>
