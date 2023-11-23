<?php
require_once 'db_config.php';

// Check if the email and token parameters are provided in the URL
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Verify the email and token in the forgot_password table
    $sql = "SELECT id FROM forgot WHERE email = ? AND token = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('ss', $email, $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            // Display the password reset form if the email and token are valid
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve the new password and confirm password
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];

                // Validate the new password and confirm password
                if (empty($new_password)) {
                    echo 'Please enter a new password.';
                    exit;
                } elseif (strlen($new_password) < 6) {
                    echo 'Password must have at least 6 characters.';
                    exit;
                } elseif ($new_password !== $confirm_password) {
                    echo 'New password and confirm password do not match.';
                    exit;
                }

                // Update the user's password in the database
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE `forgot` SET password = ? WHERE email = ?";

                if ($update_stmt = $conn->prepare($update_sql)) {
                    $update_stmt->bind_param('ss', $hashed_password, $email);

                    if ($update_stmt->execute()) {
                        // Password reset successful, redirect to the login page
                        header('Location: login.php');
                        exit;
                    } else {
                        echo 'Something went wrong. Please try again later.';
                        exit;
                    }
                }
            }
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Binder - Reset Password</title>
                <link rel="stylesheet" href="registerstyle.css" />
            </head>
            <body>
                <div class="register-container">
                    <img src="logobinder3.png" class="logo" alt="Binder! Logo">
                    <div class="inputan">
                    <h1>Reset Password</h1>
                    </div>
                    <form action="" method="POST">
                        <input type="password" name="new_password" placeholder="New Password" required>
                        <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
                        <button type="submit">Reset Password</button>
                    </form>
                </div>
            </body>
            </html>
            <?php
        } else {
            // Invalid email or token, display an error message
            echo 'Invalid email or token.';
        }

        $stmt->close();
    }
} else {
    // Email and token parameters are not provided, redirect to the forgot.php page
    header('location: forgot.php');
    exit;
}

$conn->close();
?>
