<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['alertMessage'] = "Logged out";
header("Location: manage-wedding.php"); // Redirect to home or login page
exit;
?>