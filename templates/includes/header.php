<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="templates/includes/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/includes/css/main.css">
	<link rel="stylesheet" type="text/css" href="templates/includes/css/<?php echo $cssFileName;?>">
	<link rel="icon" href="templates/includes/images/website-icon.png" type="image/png">
	<style>
        /* CSS styles for the error message */
        .error-message {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: var(--brandColor);
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: var(--p-fontsize);
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
			z-index:3;
        }
        .error-message.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
<?php
if (isset($_SESSION['alertMessage'])) {
	$alertMessage = $_SESSION['alertMessage'] ?? null;
	unset($_SESSION['alertMessage']);
}
	
?>

<?php if (!empty($alertMessage)): ?>
	<div id="error-message" class="error-message">
		<?php echo htmlspecialchars($alertMessage); ?>
	</div>
<?php endif; ?>
