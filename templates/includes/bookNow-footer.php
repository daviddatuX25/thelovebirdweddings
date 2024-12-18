<footer class="booknow button-hover">
	<a href="create-wedding.php">
		<span>
			<?php
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			
			if(isset($_SESSION["wedding_id"])){
				echo "Manage wedding";
			} else {
				echo "Book now";
			}
			?>
		</span>
		<i class="fa fa-arrow-circle-o-right"></i>
	</a>
</footer>