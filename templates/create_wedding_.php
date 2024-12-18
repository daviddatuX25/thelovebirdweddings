<?php 

$nav_isActive = array("createPage"=>"active");
include 'includes/header.php';?>
<?php include 'includes/manage-nav.php';?>
<script type="javascript/text" src="templates/includes/js/create_form.js"></script>
<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<!-- Bride -->
		<div class="input-group flex-half slide">
			<h3>Bride's Name</h3>
			<div class="input size-normal"> <!-- Input subgroup-->
				<label for="firstName">First Name</label>
				<input type="text" name="bride_firstName" required>
				<img class="partnersIcon" src="templates/includes/images/bride.png">
			</div>
			<div class="input size-normal"> <!-- Input subgroup-->
				<label for="lastName">Last Name</label>
				<input  type="text" name="bride_lastName" required>
			</div>
		</div>
		<!-- Groom -->
		<div class="input-group flex-half slide-reverse">
			<h3>Groom's Name</h3>
			<div class="input size-normal">
				<label for="firstName">First Name(*)</label>
				<input type="text" name="groom_firstName" required>
				<img class="partnersIcon" src="templates/includes/images/groom.png">
			</div>
			<div class="input size-normal">
				<label for="lastName">Last Name(*)</label>
				<input type="text" name="groom_lastName" required>
			</div>
		</div>
		<!-- Contact -->
		<div class="input-group">
			<h3>Contact</h3>
			<div class="input size-normal">
				<label for="mobileNumber">Mobile no.(*)</label>
				<input type="number" name="mobileNumber" required>
				<i class="fa fa-phone" aria-hidden="true"></i>
			</div>
			<div class="input size-normal">
				<label for="emailAddress">Email Address</label>
				<input type="email" name="emailAddress">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</div>
		</div>
		<!-- Theme -->
		<div class="input-group">
			<h3>Theme</h3>
			<?php foreach($themes as $theme):?>
			<div class="input option button-hover" for="theme_id">
				<img src="templates/includes/images/themes/<?php echo $theme->theme_name;?>/icon.png" alt="select theme">
				<div class="option-content">
					<input type="radio" name="theme_id" value="<?php echo $theme->theme_id;?>">
					<label><?php echo $theme->theme_name;?> Theme</label>
				</div>
			</div>
			<?php endforeach;?>
		</div>
		<!-- Theme Color -->
		<div class="input-group">
			<h3>Color Theme</h3>
			<div class="input">
				<input id="theme_color" type="color" name="theme_color">
				<label for="theme_color">[ Please select your color theme ]</label>
			</div>
		</div>

		<!-- Locations -->
		<div class="input-group">
		<h3>Locations</h3>
		<div class="input size-large">
			<label for="weddingLocation">Wedding</label>
			<!-- Text input with datalist for suggestions -->
			<input list="weddingLocations" name="weddingLocation" id="weddingLocation" placeholder="Enter wedding location">
			
			<!-- Datalist for suggestions -->
			<datalist id="weddingLocations">
				<option value="Club Paradise Resort, Palawan, Philippines"></option>
				<option value="The Garden: Light Of Love, Quezon, Philippines"></option>
				<option value="Whimsical Fairytale Fantasy, Tagaytay, Philippines"></option>
				<option value="El Nido Resorts - Miniloc Island, Palawan, Philippines"></option>
				<option value="The Flower Farm, Tagaytay, Philippines"></option>
				<option value="Casa Roces, Manila, Philippines (Vintage Theme)"></option>
				<option value="The Glass Garden, Pasig, Philippines (Garden Theme)"></option>
				<option value="Lokal Hostel, Cebu City, Philippines (Bohemian Theme)"></option>
				<option value="Acuatico Beach Resort, Batangas, Philippines (Beach Theme)"></option>
				<option value="La Villa Boutique Hotel, Batangas, Philippines (Garden & Vintage Themes)"></option>
			</datalist>
			
			<i class="fa-solid fa-location-dot"></i>
		</div>

		<!-- Marriage Date -->
		<div class="input-group">
			<h3>Marriage Date</h3>
			<div class="input short">
				<label for="weddingDate">Date</label>
				<input id="weddingDate" type="date" name="weddingDate">
				<i class="fa-solid fa-calendar-days"></i>
			</div>
		</div> 
		<div class="input-group">
			<h3>Wedding Credentials</h3>
			<div class="input size-normal">
				<label for="weddingKey">Wedding key(*)</label>
				<input id="weddingKey" type="text" name="weddingKey" required>
				<i class="fa-solid fa-key"></i>
			</div>
			<div class="input size-normal">
				<label for="password">Password(*)</label>
				<input id="password" type="password" name="password" required>
			</div>
		</div> 
		<input class="button-hover" type="submit" name="submit">
	</form>
</div>
<?php include 'includes/copyright.php';
	include 'includes/footer.php';
?>
