<?php
// Include Config Files
include_once 'config/init.php';

// Load Database
$weddingsDB = new Weddings();
$participants = new Participants();
$themes = new Themes();


// Load View Wedding Page
$weddingEvent = new Template("templates/wedding-event_.php");

if (isset($_GET['wedding_id'])) {
	// Prepare DB: wedding event information and its participants
	$weddingEvent->weddingInformation = $weddingsDB->getWeddingById($_GET['wedding_id']);
	$weddingEvent->weddingParticipants = $participants->getWeddingParticipants($_GET['wedding_id']);
	$weddingEvent->weddingTheme = $themes;
	$weddingEvent->pageTitle = "View wedding event";
	$weddingEvent->cssFileName = "couple.css";

	echo $weddingEvent; // Display page


} else {
	header("Location: manage-wedding.php?page=create");
}
?>