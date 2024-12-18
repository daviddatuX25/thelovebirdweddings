<?php
// Include Config Files
include_once 'config/init.php';
if(!isset($_SESSION['wedding_id'])){
	session_start();
}

// Load Database
$testimoniesDB = new Testimonies();

// Login Key for testimonies creation
if(isset($_POST['wedding_key'])){
	// Retrieve the input values
    $weddingKey = Sanitizer::test_input($_POST['wedding_key']);
    $weddingId_inputed = Sanitizer::test_input($_POST['wedding_id']);
    // Validate the credentials
    $weddingsDB = new Weddings();
    $weddingKeyVerified_input = $weddingsDB->getWeddingByKey($weddingKey);
	$weddingKeyVerified_refered = $weddingsDB->getWeddingKeyById($weddingId_inputed);
    if ($weddingKeyVerified_input) {
		if ($weddingKeyVerified_input->wedding_key == $weddingKeyVerified_refered->wedding_id){
			// Store wedding ID in session
			$_SESSION['wedding_key'] = $weddingKeyVerified_input->wedding_key;
			$_SESSION['wedding_id'] = $weddingKeyVerified_input->wedding_id;
			header("Location: {$_SERVER['PHP_SELF']}");
			exit();
		} else {
			echo "Incorrect Wedding Key for this Wedding.";
			header("Location: {$_SERVER['PHP_SELF']}?wedding_id={$_POST['wedding_id']}");
		}
	} else {
		echo "Doesn't match any wedding record";
		header("Location: {$_SERVER['PHP_SELF']}");
		
	}
}

// Form submission Create
if(isset($_POST['create_testimony'])){
	$assignment_id = Sanitizer::test_input($_POST['assignment_id']);
	$comment = Sanitizer::test_input($_POST['comment']);
	$ratings = (float)Sanitizer::test_input($_POST['ratings']);
	$testimoniesDB->createTestimony($assignment_id, $comment,$ratings);
	echo "Testimony created";
}

// Form submission Update
if(isset($_POST['render_testimony'])){
	$assignment_id = Sanitizer::test_input($_POST['assignment_id']);
	$testimonyId = (int) $testimoniesDB->getTestimonyIdByRoleAssignments($assignment_id);
	$comment = Sanitizer::test_input($_POST['comment']);
	$ratings = (float)Sanitizer::test_input($_POST['ratings']);
	$testimoniesDB->updateTestimony($testimonyId, $assignment_id, $comment,$ratings);
	echo "Testimony Updated";
}


// Load View Wedding Page
$testimoniesPage = new Template("templates/testimonies_.php");
$testimoniesPage->cssFileName = "testimonies.css";
$maxReviewPerPage = 8;
if(isset($_SESSION['wedding_key'])) {
	if(isset($_SESSION['password'])){
		// Able to Update
		$testimoniesPage->pageTitle = "Testimonies|Admin";
		$testimoniesPage->admin = true;
		$testimoniesPage->emptyTestimonies = $testimoniesDB->getAdminTestimonies($_SESSION['wedding_id']);	
	} else {
		// Able to Create only
		$testimoniesPage->pageTitle = "Testimonies|Private";
		$testimoniesPage->admin = false;
		if(isset($_SESSION['wedding_id'])){
			$testimoniesPage->testimonies = $testimoniesDB->getTestimoniesByWedId($_SESSION['wedding_id'], $maxReviewPerPage);
			$testimoniesPage->emptyTestimonies = $testimoniesDB->getEmptyTestimonies($_SESSION['wedding_id']);	
		}
	}
} else if(isset($_GET['wedding_id'])){
	$testimoniesPage->inputWedKey = true;
	$testimoniesPage->pageTitle = "Testimonies|Public";
	$testimoniesPage->testimonies = $testimoniesDB->getTestimoniesByWedId($_GET['wedding_id'], $maxReviewPerPage);
} else {
	// Show all testimonies
	$testimoniesPage->testimonies = $testimoniesDB->getTestimonies($maxReviewPerPage);
	$testimoniesPage->pageTitle = "Testimonies|All";
}
echo $testimoniesPage;
?>