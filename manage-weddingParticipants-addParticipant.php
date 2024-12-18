<?php
// Include Config Files
include_once 'config/init.php';
session_start();
$weddingID = $_SESSION["wedding_id"];
// Verify session
if (!isset($_SESSION['wedding_id']) && !isset($_SESSION['wedding_password'])) {
    header("Location: manage-wedding.php");
    session_unset();
    session_destroy();
    exit();
}

// Load Database
$participantsDB = new Participants();
$rolesDB = new Roles(); // Assuming you have a Roles class to fetch roles
$roleAssignmentDB = new RoleAssignments(); // Load RoleAssignment class

// Load View Add Participant Page
$addParticipantPage = new Template("templates/manage-weddingParticipants-addParticipant_.php");
$addParticipantPage->cssFileName = "create_wedding.css";
$addParticipantPage->pageTitle = "Manage Wedding | Add participant";

// Fetch roles (except bride and groom) for the select option
$rolesUnfiltered = $rolesDB->getAllRoles();
$rolesFiltered = [];
foreach($rolesUnfiltered as $role){
    if($role->role_name != "Bride" || $role->role_name != "Groom"){
        $rolesFiltered[] = $role;
    }
}
$addParticipantPage->roles = $rolesFiltered;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize an array to hold participant data
    $participantData = [];

    // Process form data
    $participantData = [
        'first_name' => Sanitizer::test_input($_POST['first_name'] ?? null), // Required
        'last_name' => Sanitizer::test_input($_POST['last_name'] ?? null), // Required
        'birthday' => isset($_POST['birthday']) ? Sanitizer::validate_date($_POST['birthday']) : null, // Optional
        'contact_no' => Sanitizer::test_input($_POST['contact_no']) ?? null, // Optional
        'barangay' => Sanitizer::test_input($_POST['barangay'] ?? null), // Optional
        'city' => Sanitizer::test_input($_POST['city'] ?? null), // Optional
        'province' => Sanitizer::test_input($_POST['province'] ?? null), // Optional
    ];

    // Handle photo upload if a file is submitted
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        // Extract the file name and extension
        $photoTmp = $_FILES['photo']['tmp_name'];
        $photoName = $_FILES['photo']['name'];
        
        // Define a unique name or use a specific format (e.g., participant ID or timestamp)
        $photoExt = pathinfo($photoName, PATHINFO_EXTENSION);
        $photoFinalName = "participant_{$participantId}.{$photoExt}";
        
        // Define the directory to store the photo
        $clientFiles = "clients/partner-". $weddingID ."/" . $role_name . "/";
        if (!is_dir($clientFiles)) {
            mkdir($clientFiles, 0775, true); // Create directory if it doesn't exist
        }
    
        // Define the full photo path
        $photoPath = $clientFiles . $photoFinalName;
    
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($photoTmp, $photoPath)) {
            // Set the photo name in the participantData array for update
            $participantData['photo'] = $photoFinalName;
        } else {
            $participantData['photo'] = null; // If no upload is successful, set to null
        }
    }

    // Validate required fields
    if (empty($participantData['first_name']) || empty($participantData['last_name'])) {
        $_SESSION['alertMessage'] = "First name and last name are required..";
    } else {
        $participantId = $participantsDB->createParticipant($participantData);
        $roleAssignmentDB->createRoleAssignment($weddingID, $participantId, $_POST['role_id']); // Assuming this method exists
        $_SESSION['alertMessage'] = "Participant added.";
        header("Location: manage-weddingParticipants.php");
        exit();
        
    }
}

echo $addParticipantPage;
?>