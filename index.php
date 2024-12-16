<?php
// Include Config Files
include_once 'config/init.php';

// Load Database
$weddingsDB = new Weddings(); // Use the new Weddings class

// Load Highlights Page
$weddingsPage = new Template("templates/weddings_.php");
$weddingsPage->pageTitle = "Highlights";
$weddingsPage->cssFileName = "weddings.css";

// Check if a sort parameter is set
if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'upcomming':
            $weddingsPage->weddings = $weddingsDB->getAllWeddings_openersInfo("upcomming");
            break;
        case 'held':
            $weddingsPage->weddings = $weddingsDB->getAllWeddings_openersInfo("held");
            break;
        default:
            break;
    }
} else {
    // Fetch all weddings if no sort parameter is set
    $weddingsPage->weddings = $weddingsDB->getAllWeddings_openersInfo("");
}

// Display the page
echo $weddingsPage; 

?>