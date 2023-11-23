<?php
session_start();
require_once 'db_config.php';

// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = '';
$username_err = $email_err = $password_err = $confirm_password_err = '';

// Processing form data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate username
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter a username.';
    } else {
        $username = trim($_POST['username']);
    }

    // Validate email
    if (empty(trim($_POST['email']))) {
        $email_err = 'Please enter an email address.';
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Please enter a valid email address.';
    } else {
        $email = trim($_POST['email']);
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter a password.';
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = 'Password must have at least 6 characters.';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Please confirm the password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($password !== $confirm_password) {
            $confirm_password_err = 'Password and confirm password do not match.';
        }
    }

    // Check for input errors before inserting into the database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO register (username, email, password) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters to the prepared statement
            $stmt->bind_param('sss', $username, $email, password_hash($password, PASSWORD_DEFAULT));

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Set the username in the session
                $_SESSION['username'] = $username;

                // Redirect to login page after successful registration
                echo '<script>window.location.href = "login.php";</script>';
                exit;
            } else {
                echo 'Something went wrong. Please try again later.';
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}

// Define the home page URL based on the user's login status
$homePage = isset($_SESSION['username']) ? 'home.php' : 'binder.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Binder! - Register</title>
    <link rel="stylesheet" href="registerstyle.css">
</head>

<body>
    <div class="register-container">
        <img src="logobinder3.png" class="logo" alt="Binder! Logo">
        </a>
        <h1>Register Now!</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
            <p class="error-message"><?php echo $username_err; ?></p>
            <p class="error-message"><?php echo $email_err; ?></p>
            <p class="error-message"><?php echo $password_err; ?></p>
            <p class="error-message"><?php echo $confirm_password_err; ?></p>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>

</html>
