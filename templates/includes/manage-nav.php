<nav>
	<ul class="nav">
		<?php
			if(empty($_SESSION["wedding_id"])):
		?>
		<li class="<?php echo $nav_isActive["createPage"]??NULL;?>">
			<a href="create-wedding.php">Create Event</a>
		</li>
		<li class="<?php echo $nav_isActive["managePage"]??NULL;?>">
			<a href="manage-wedding.php">Manage Event</a>
		</li>
		<?php else:?>
		<li class="<?php echo $nav_isActive["detailsPage"]??NULL;?>"><a href="manage-wedding.php">Wedding Details</a></li>
		<li class="<?php echo $nav_isActive["participantsPage"]??NULL;?>"><a href="manage-participants.php">Participants</a></li>
		<li class="<?php echo $nav_isActive["tesetimoniesPage"]??NULL;?>"><a href="manage-testimonies.php">Testimonies</a></li>
		<li id="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
		<?php endif;?>
	</ul>
</nav>