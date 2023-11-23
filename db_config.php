<?php
// $servername = "localhost";
// $username = "binderrr";
// $password = "binderrr123";
// $database = "softeng";

$servername = "localhost";
$username = "biny2692_albresco";
$password = "adampoer31";
$database = "biny2692_softeng";


// Create a database connection if it doesn't exist
if (!isset($conn)) {
    $conn = new mysqli($servername, $username, $password, $database);
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>
