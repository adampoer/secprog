<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate email
    if (empty(trim($_POST['email']))) {
        $email_err = 'Please enter your email address.';
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Please enter a valid email address.';
    } else {
        $email = trim($_POST['email']);

        // Generate a random token
        $token = bin2hex(random_bytes(32));

        // Store the email and token in the forgot_password table
        $sql = "INSERT INTO forgot (email, token) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('ss', $email, $token);

            if ($stmt->execute()) {
                // Redirect the user to the reset_password.php page with the email and token as URL parameters
                $reset_password_url = "reset_password.php?email=" . urlencode($email) . "&token=" . urlencode($token);
                header('Location: ' . $reset_password_url);
                exit;
            } else {
                echo 'Something went wrong. Please try again later.';
            }

            $stmt->close();
        }
    }

    $conn->close();
}

// Define the home page URL based on the user's login status
$homePage = isset($_SESSION['username']) ? 'home.php' : 'binder.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Binder - Forgot Password</title>
  <link rel="stylesheet" href="styleforgot.css" />
</head>
<body>
  <section class="container" id="container">
    <div class="head">
    <a href="<?php echo $homePage; ?>">
      <img src="logobinder3.png" class="logoo">
      </a>
    </div>
    <p class="msg">Forgot Password</p>
    <div class="form">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="email" placeholder="Email" name="email" class="text" id="email" required><br>
        <button type="submit" class="btn-login">Reset Password</button>
        <p class="footermsg">Remember your password? <a href="login.php">Just Log in!</a></p>
      </form>
    </div>
  </section>
</body>
</html>
