<?php
// Include Config Files
include_once 'config/init.php';

// Load Database 
$employeesDB = new Employees(); // Use the Employees class

// Load About Page Template
$about = new Template("templates/about_.php");

$about->employees = $employeesDB->getAllEmployees(); // Fetch all employees
$about->pageTitle = "About Us"; // Update page title
$about->cssFileName = "about.css";

echo $about; // Display page
?>