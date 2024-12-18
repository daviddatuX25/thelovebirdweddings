<nav>
	<ul class="nav">
		<?php
			if(empty($_SESSION["wedding_id"])):
		?>
		<li class="<?php echo $nav_isActive["createPage"]??NULL;?>">
			<a href="create-wedding.php">Create Event</a>
		</li>
		<li class="button-hover no-magic">
			<a href="index.php">
				<i class="fa-solid fa-angles-up"></i>
			</a>
		</li>
		<li class="<?php echo $nav_isActive["managePage"]??NULL;?>">
			<a href="manage-wedding.php">Manage Event</a>
		</li>
		<?php else:?>
		<li class="<?php echo $nav_isActive["detailsPage"]??NULL;?>"><a href="manage-weddingDetails.php">Wedding Details</a></li>
		<li class="<?php echo $nav_isActive["participantsPage"]??NULL;?>"><a href="manage-weddingParticipants.php">Participants</a></li>
		<li class="<?php echo $nav_isActive["tesetimoniesPage"]??NULL;?>"><a href="testimonies.php?wedding_id=<?php echo $_SESSION['wedding_id'];?>">Testimonies</a></li>
		<li id="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
		<?php endif;?>
	</ul>
</nav>