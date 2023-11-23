<!-- <?php
session_start();

require_once 'db_config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to fetch the user from the database
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User exists, verify the password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to home page
            $_SESSION['username'] = $row['username'];
            header("Location: home.php");
            exit();
        } else {
            // Invalid password
            $errorMessage = "Invalid password";
        }
    } else {
        // User does not exist
        $errorMessage = "User does not exist";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
    
require_once 'db_config.php';

?> -->
