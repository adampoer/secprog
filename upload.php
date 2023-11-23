<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: binder.php");
    exit();
}

// Check if the form is submitted and a file is selected
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {
    $file = $_FILES['fileToUpload'];

    // Validate the file
    if ($file['error'] === 0) {
        // Specify the target directory to save the uploaded file
        $targetDir = __DIR__ . "/uploads/";

        // Create the "uploads" directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        } else {
            chmod($targetDir, 0755); // Change the permissions of an existing directory to 755
        }

        // Generate a unique filename for the uploaded file
        $filename = uniqid() . '_' . basename($file['name']);
        $targetPath = $targetDir . $filename;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // File upload successful, perform any additional tasks (e.g., save the filename to the database)

            // Store the uploaded filename in the session
            $_SESSION['uploadedFile'] = $filename;

            // Redirect the user to myprojects.php
            header("Location: myprojects.php");
            exit();
        } else {
            $errorMessage = "Error uploading file.";
        }
    } else {
        $errorMessage = "File upload error: " . $file['error'];
    }
} else {
    $errorMessage = "Invalid request.";
}
?>

<html>
<head>
    <title>Binder! - Upload</title>
    <link rel="stylesheet" href="styleupload.css" />
</head>

<body>
<div class="banner">
    <div class="navbar">
        <a href="<?php echo isset($_SESSION['username']) ? 'home.php' : 'binder.php'; ?>">
            <img src="logobinder3.png" class="logo">
        </a>
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
    <div class="upload-container">
        <h2>Upload Image</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .png">
            <input type="submit" value="Upload" name="submit">
        </form>
    </div>
</div>
</body>
</html>
