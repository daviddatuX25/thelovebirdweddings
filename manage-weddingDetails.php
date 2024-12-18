<?php
include_once 'config/init.php';
// Verify session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['wedding_id']) && !isset($_SESSION['wedding_password'])) {
    header("Location: manage-wedding.php");
    session_unset();
    session_destroy();
    exit();
}
$weddingsDB = new Weddings();
$themes = new Themes();
$manageWedding_DetailsPage = new Template("templates/manage-weddingDetails_.php");
$manageWedding_DetailsPage->themes = $themes->getThemes();
$manageWedding_DetailsPage->cssFileName = "create_wedding.css";
$manageWedding_DetailsPage->pageTitle = "Manage Wedding Details";



// Get wedding information
$weddingInformation = $weddingsDB->getWeddingById($_SESSION['wedding_id']);

// Handle update wedding details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_wedding'])) {
    $weddingData = [
        'wedding_date' => Sanitizer::test_input($_POST['wedding_date'] ?? ''),
        'description' => Sanitizer::test_input($_POST['description'] ?? ''),
        'theme_id' => Sanitizer::test_input($_POST['theme_id'] ?? ''),
        'theme_color' => Sanitizer::test_input($_POST['theme_color'] ?? ''),
        'wedding_location' => Sanitizer::test_input($_POST['wedding_location'] ?? ''),
        'prenup_location' => Sanitizer::test_input($_POST['prenup_location'] ?? ''),
        'mobile_number' => Sanitizer::test_input($_POST['mobile_number'] ?? ''),
        'email_address' => Sanitizer::validate_email($_POST['email_address'] ?? '') 
            ? Sanitizer::test_input($_POST['email_address']) 
            : null // Set null if email is invalid
    ];

    $clientFiles = 'clients/partner-'.$_SESSION['wedding_id'] . '/';
    $coupleImgsFolder = $clientFiles . "couple_images/";
    $marriageImgsFolder = $clientFiles . "marriage_images/";
    $prenupImgsFolder = $clientFiles . "prenup_images/";
    

    // Create directory if it doesn't exist
    if (!is_dir($clientFiles)) {mkdir($clientFiles, 0777, true);}

    // Initialize variables for image paths
    $marriageImagePath = null;
    $prenupImagePath = null;
    $coupleImagePath = null;


    // Handle couple image upload
    if (isset($_FILES['couple_image'])) {
        if (!is_dir($coupleImgsFolder)) {mkdir($coupleImgsFolder, 0777, true);}
        if ($_FILES['couple_image']['error'] == UPLOAD_ERR_OK) {
            $coupleImage = $_FILES['couple_image'];
            $coupleImagePath = $coupleImgsFolder . $coupleImage["name"];
            if (!move_uploaded_file($coupleImage['tmp_name'], $coupleImagePath)) {
                $manageWedding_DetailsPage->alertMessage = "Failed to move uploaded file for couple image.";
            }
        } else {
            $manageWedding_DetailsPage->alertMessage = "Couple image upload error: " . $_FILES['couple_image']['error'];
        }
    }

     // Handle marriage image upload
     if (isset($_FILES['marriage_image'])) {
        if (!is_dir($marriageImgsFolder)) {mkdir($marriageImgsFolder, 0777, true);}
        if ($_FILES['marriage_image']['error'] == UPLOAD_ERR_OK) {
            $marriageImage = $_FILES['marriage_image'];
            $marriageImagePath = $marriageImgsFolder . $marriageImage["name"];
            if (!move_uploaded_file($marriageImage['tmp_name'], $marriageImagePath)) {
                error_log("Failed to move uploaded file for marriage image.");
                $manageWedding_DetailsPage->alertMessage = "Failed to move uploaded file for marriage image.";
            }
        } else {
            $manageWedding_DetailsPage->alertMessage = "Couple image upload error: " . $_FILES['marriage_image']['error'];
        }
    }

    // Handle prenup image upload
    if (isset($_FILES['prenup_image'])) {
        if (!is_dir($prenupImgsFolder)) {mkdir($prenupImgsFolder, 0777, true);}
        if ($_FILES['prenup_image']['error'] == UPLOAD_ERR_OK) {
            $prenupImage = $_FILES['prenup_image'];
            $prenupImagePath = $prenupImgsFolder . $prenupImage["name"];
            if (!move_uploaded_file($prenupImage['tmp_name'], $prenupImagePath)) {
                $manageWedding_DetailsPage->alertMessage = "Failed to move uploaded file for prenup image.";
            }
        } else {
            $manageWedding_DetailsPage->alertMessage = "Couple image upload error: " . $_FILES['prenup_image']['error'];
        }
    }

    // Update the database with the image paths if they were uploaded
    if ($marriageImagePath) {
        $weddingsDB->updateWedding($_SESSION['wedding_id'], ['wedding_photo' => $marriageImagePath]);
    }
    if ($prenupImagePath) {
        $weddingsDB->updateWedding($_SESSION['wedding_id'], ['prenup_photo' => $prenupImagePath]);
    }
    if ($coupleImagePath) {
        $weddingsDB->updateWedding($_SESSION['wedding_id'], ['couple_photo' => $coupleImagePath]);
    }

    $weddingsDB->updateWedding($_SESSION['wedding_id'], $weddingData);
    $_SESSION['alertMessage'] = "Successfully updated wedding details.";
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
} else {
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