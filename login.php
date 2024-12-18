<?php
// Include Config Files
include_once 'config/init.php';

// Load Database
$weddingsDB = new Weddings();

// Load Login Page Template
$loginPage = new Template("templates/manage-wedding_.php");
$loginPage->pageTitle = "Login";
$loginPage->cssFileName = "login.css"; // Optional: Add a CSS file for styling

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weddingKey = $_POST['wedding_key'];
    $password = $_POST['password'];

    // Validate credentials
    $wedding = $weddingsDB->getWeddingByKeyAndPassword($weddingKey, $password);
    if ($wedding) {
        // Set session variables
        $_SESSION['wedding_id'] = $wedding->wedding_id;
        $_SESSION['wedding_key'] = $wedding->wedding_key;
        $_SESSION['password'] = $wedding->password;
        header("Location: manage-weddingDetails.php");
        exit();
    } else {
        $loginPage->errorMessage = "Invalid wedding key or password.";
    }
}

echo $loginPage; // Display the login page
?>