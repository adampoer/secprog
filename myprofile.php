<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve the updated profile information
        $name = $_POST["name"];
        $username = $_POST["username"];
        $profilePicture = $_FILES["profilePicture"]["name"];
        // Here you would typically process and save the updated information

        // Example: Display a success message
        echo "<p>Profile updated successfully!</p>";
    }
    ?>


<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="stylemyprofile.css" />  
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
                        <a href="https://linktr.ee/Binder_softeng">Help</a>
                    </div>
                </li>
                <li class="search">
                    <form action="search.php" method="GET">
                        <input type="text" name="query" placeholder="Search...">
                    </form>
                </li>
        </ul>
        
        </div>
        <div class="container">
        <h1>My Profile</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="profilePicture">Profile Picture:</label>
        <input type="file" name="profilePicture" accept="image/*" required>

        <input type="submit" value="Update Profile">
    </form>
        </div>

    
</body>
</html>
