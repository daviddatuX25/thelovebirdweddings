<?php
session_start();
session_unset();
session_destroy();
header("Location: manage-wedding.php"); // Redirect to home or login page
exit();
?>