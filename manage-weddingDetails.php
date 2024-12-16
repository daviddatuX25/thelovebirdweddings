<?php
include_once 'config/init.php';
session_start();

$weddingsDB = new Weddings();
$themes = new Themes();
$manageWedding_DetailsPage = new Template("templates/manage-weddingDetails_.php");
$manageWedding_DetailsPage->themes = $themes->getThemes();
$manageWedding_DetailsPage->cssFileName = "create_wedding.css";
$manageWedding_DetailsPage->pageTitle = "Manage Wedding Details";

// Verify session
if (!isset($_SESSION['wedding_id'])) {
    header("Location: manage-wedding.php");
    exit();
}

// Get wedding information
$weddingInformation = $weddingsDB->getWeddingById($_SESSION['wedding_id']);

// Handle update wedding details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_wedding'])) {
    $weddingData = [
        'wedding_date' => $_POST['wedding_date'],
        'description' => $_POST['description'],
        'theme_id' => $_POST['theme_id'],
        'theme_color' => $_POST['theme_color'],
        'wedding_location' => $_POST['wedding_location'],
        'prenup_location' => $_POST['prenup_location'],
        'mobile_number' => $_POST['mobile_number'],
        'email_address' => $_POST['email_address'],
    ];

    $clientFiles = 'clients/partner-'.$_SESSION['wedding_id'] . '/';

    // Create directory if it doesn't exist
    if (!is_dir($clientFiles)) {
        mkdir($clientFiles, 0777, true);
    }

    // Initialize variables for image paths
    $marriageImagePath = null;
    $prenupImagePath = null;

    // Handle marriage image upload
    if (isset($_FILES['marriage_image'])) {
        if ($_FILES['marriage_image']['error'] == UPLOAD_ERR_OK) {
            $marriageImage = $_FILES['marriage_image'];
            $marriageImagePath = $clientFiles . "marriage.jpg";
            if (!move_uploaded_file($marriageImage['tmp_name'], $marriageImagePath)) {
                error_log("Failed to move uploaded file for marriage image.");
            }
        } else {
            error_log("Marriage image upload error: " . $_FILES['marriage_image']['error']);
        }
    }

    // Handle prenup image upload
    if (isset($_FILES['prenup_image'])) {
        if ($_FILES['prenup_image']['error'] == UPLOAD_ERR_OK) {
            $prenupImage = $_FILES['prenup_image'];
            $prenupImagePath = $clientFiles . "prenup.jpg";
            if (!move_uploaded_file($prenupImage['tmp_name'], $prenupImagePath)) {
                error_log("Failed to move uploaded file for prenup image.");
            }
        } else {
            error_log("Prenup image upload error: " . $_FILES['prenup_image']['error']);
        }
    }

    // Update the database with the image paths if they were uploaded
    if ($marriageImagePath) {
        $weddingsDB->updateWedding($_SESSION['wedding_id'], ['wedding_photo' => $marriageImagePath]);
    }
    if ($prenupImagePath) {
        $weddingsDB->updateWedding($_SESSION['wedding_id'], ['prenup_photo' => $prenupImagePath]);
    }

    $weddingsDB->updateWedding($_SESSION['wedding_id'], $weddingData);

    header("Location: manage-wedding.php");
    exit();
}

// Handle delete wedding
if (isset($_POST['delete'])) {
    $weddingsDB->deleteWedding($_SESSION['wedding_id']);
    $_SESSION[] = [];
    session_unset();
    session_destroy();
    header("Location: manage-wedding.php");
    exit();
}   

// Display the page
$manageWedding_DetailsPage->weddingInformation = $weddingInformation;
echo $manageWedding_DetailsPage;
?>