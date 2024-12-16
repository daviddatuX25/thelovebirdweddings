<?php 
$nav_isActive = array("testimoniesPage"=>"","weddingEventsPage"=>"","aboutPage"=>"active");
include 'includes/header.php';?>
<?php include 'includes/main-nav.php';?>

<section class="main">
		<!-- David -->
		<?php foreach($employees as $employee):?>
		<div class="employee">
			<div class="circle-bg">
				<img src="employees/<?php echo $employee->photo?>" alt="employee-boss">
			</div>
			<div class="employee-data">
				<h3 class="employee-name"><?php echo $employee->first_name . " " . $employee->last_name?></h3>
				<ul class="employee-roles">
					<li><?php echo $employee->roles?></li>
				</ul>
				<ul class="employee-socialLinks">
					<li><a href="<?php echo $employee->facebook_url?>"><i class="fa-brands fa-facebook"></i></a></li>
					<li><a href="<?php echo $employee->instagram_url?>"><i class="fa-brands fa-instagram"></i></a></li>
					<li><a href="mailto:<?php echo $employee->email?>"><i class="fa-solid fa-envelope"></i></a></li>
				</ul>
			</div>
		</div>
	<?php endforeach;?>

</section>	

<?php include 'includes/copyright.php';?>
<?php include 'includes/footer.php';?>
