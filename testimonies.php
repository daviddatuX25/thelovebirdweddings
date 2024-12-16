<?php
// Include Config Files
include_once 'config/init.php';

// Load Database
$testimoniesDB = new Testimonies();

// Load View Wedding Page
$testimoniesPage = new Template("templates/testimonies_.php");
$testimoniesPage->cssFileName = "testimonies.css";

$maxReviewPerPage = 8;
if (isset($_GET['wedding_id'])) {
	$testimoniesPage->testimonies = $testimoniesDB->getTestimoniesByWedId($_GET['wedding_id'], $maxReviewPerPage);

	if(isset($_SESSION['wedding_key'])){
		$testimoniesPage->pageTitle = "Testimonies|Private";
	} else {
		$testimoniesPage->pageTitle = "Testimonies|Public";
	}
} else {
	// Show all testimonies
	$testimoniesPage->testimonies = $testimoniesDB->getTestimonies($maxReviewPerPage);
	$testimoniesPage->pageTitle = "Testimonies|All";
}

echo $testimoniesPage;

?>