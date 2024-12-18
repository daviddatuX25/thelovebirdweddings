<?php
include_once 'config/init.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['wedding_id']) && !isset($_SESSION['wedding_password'])) {
    header("Location: manage-wedding.php");
    session_unset();
    session_destroy();
    exit();
}

$participantsDB = new Participants();

// Load Page
$manageWeddingParticipantsPage = new Template("templates/manage-weddingParticipants_.php");
$manageWeddingParticipantsPage->pageTitle = "Manage Wedding | Participants";
$manageWeddingParticipantsPage->cssFileName = "create_wedding.css";
$RolesDB = new Roles();
$manageWeddingParticipantsPage->RolesDB = $RolesDB;
$weddingID = $_SESSION['wedding_id'];
$groupedParticipants = [];
$raw_weddingRolesAndParticipants = $participantsDB->getWeddingRolesAndParticipants($weddingID);

$groupedParticipants = array();

foreach ($raw_weddingRolesAndParticipants as $participant) {
    // Get the role name and participant details
    $roleName = $participant->role_name;
    
    // Initialize the array for this role if it doesn't exist
    if (!isset($groupedParticipants[$roleName])) {
        $groupedParticipants[$roleName] = array();
    }
    
    // Add the participant to the corresponding role
    $groupedParticipants[$roleName][] = $participant;
}
$manageWeddingParticipantsPage->weddingRolesAndParticipants = $groupedParticipants;

// Assuming you're processing the form submission
if (isset($_POST['update_participant'])) {
    $role_name = $_POST['role_name'];
    // Check if participant data has been submitted (update check)
    $participantId = isset($_POST['update_participant']) ? (int) $_POST['update_participant'] : null;
    $roleId = Sanitizer::test_input($_POST['role_id'] ?? null);
    $firstName = Sanitizer::test_input($_POST['first_name'] ?? null);
    $lastName = Sanitizer::test_input($_POST['last_name'] ?? null);
    $birthday = isset($_POST['birthday']) ? Sanitizer::validate_date($_POST['birthday']) : null;
    $contactNo = isset($_POST['contact_no']) ? Sanitizer::validate_phone($_POST['contact_no']) : null;
    $barangay = Sanitizer::test_input($_POST['barangay'] ?? null);
    $city = Sanitizer::test_input($_POST['city'] ?? null);
    $province = Sanitizer::test_input($_POST['province'] ?? null);

    // Update participant information (including photo handling)
    $updatedData = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'birthday' => $birthday,
        'contact_no' => $contactNo,
        'barangay' => $barangay,
        'city' => $city,
        'province' => $province,
        'photo' => '' // Initialize photo value, it may change if photo is uploaded
    ];

    // Handle photo upload if a file is submitted
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        // Extract the file name and extension
        $photoTmp = $_FILES['photo']['tmp_name'];
        $photoName = $_FILES['photo']['name'];
        
        // Define a unique name or use a specific format (e.g., participant ID or timestamp)
        $photoExt = pathinfo($photoName, PATHINFO_EXTENSION);
        $photoFinalName = "{$participantId}_{$firstName}{$lastName}.{$photoExt}";
        
        // Define the directory to store the photo
        $photoDir = "clients/partner-". $weddingID . "/participants/" . $role_name . "/";
        if (!is_dir($photoDir)) {
            mkdir($photoDir, 0775, true); // Create directory if it doesn't exist
        }
    
        // Define the full photo path
        $photoPath = $photoDir . $photoFinalName;
    
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($photoTmp, $photoPath)) {
            // Set the photo name in the participantData array for update
            $updatedData['photo'] = $photoPath;
        } else {
            $updatedData['photo'] = null; // If no upload is successful, set to null
        }
    }
    // Update the participant's other details (excluding photo for now)
    $participantsDB->updateParticipant($participantId, $updatedData);
    header("Location: $_SERVER[PHP_SELF]");
}
echo $manageWeddingParticipantsPage;
?>
