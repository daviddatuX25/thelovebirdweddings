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
				<input type="text" name="bride_firstName">
				<img class="partnersIcon" src="templates/includes/images/bride.png">
			</div>
			<div class="input size-normal"> <!-- Input subgroup-->
				<label for="lastName">Last Name</label>
				<input  type="text" name="bride_lastName">
			</div>
		</div>
		<!-- Groom -->
		<div class="input-group flex-half slide-reverse">
			<h3>Groom's Name</h3>
			<div class="input size-normal">
				<label for="firstName">First Name</label>
				<input type="text" name="groom_firstName">
				<img class="partnersIcon" src="templates/includes/images/groom.png">
			</div>
			<div class="input size-normal">
				<label for="lastName">Last Name</label>
				<input type="text" name="groom_lastName">
			</div>
		</div>
		<!-- Contact -->
		<div class="input-group">
			<h3>Contact</h3>
			<div class="input size-normal">
				<label for="emailAddress">Email Address</label>
				<input type="email" name="emailAddress">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</div>
			<div class="input size-normal">
				<label for="mobileNumber">Mobile no.</label>
				<input type="number" name="mobileNumber">
				<i class="fa fa-phone" aria-hidden="true"></i>
			</div>
		</div>
		<!-- Theme -->
		<div class="input-group">
			<h3>Theme</h3>
			<?php foreach($themes as $theme):?>
			<div class="input option">
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
				<label for="weddingKey">Wedding key</label>
				<input id="weddingKey" type="text" name="weddingKey">
				<i class="fa-solid fa-key"></i>
			</div>
			<div class="input size-normal">
				<label for="password">Password</label>
				<input id="password" type="password" name="password">
			</div>
		</div> 

	<!-- <div class="participants">
		<h2>Participants</h2>


		<div class="input-group">
			<h3>Maid of Honor</h3>
			<div class="input size-normal">
				<label for="maidOfHonor-fn">First name</label>
				<input type="text" name="maidOfHonor-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="maidOfHonor-ln">Last name</label>
				<input type="text" name="maidOfHonor-ln">
			</div>
		</div>


		<div class="input-group">
			<h3>Best Man</h3>
			<div class="input size-normal">
				<label for="bestMan-fn">First name</label>
				<input type="text" name="bestMan-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="bestMan-ln">Last name</label>
				<input type="text" name="bestMan-ln">
			</div>
		</div>


		<div class="input-group" id="maidOfHonor">
	        <h3>Maid of Honor</h3>
	        <div class="input size-normal">
	            <label for="maidOfHonor-fn">First name</label>
	            <input type="text" name="maidOfHonor-fn">
	            <i class="fa-solid fa-user"></i>
	        </div>
	        <div class="input size-normal">
	            <label for="maidOfHonor-ln">Last name</label>
	            <input type="text" name="maidOfHonor-ln">
	        </div>
    	</div>

		<div class="input-group multi-names">
			<h3>Groomsmen</h3>
			<div class="input size-normal">
				<label for="groomsman1-fn">First name</label>
				<input type="text" name="groomsman1-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="groomsman1-ln">Last name</label>
				<input type="text" name="groomsman1-ln">
			</div>
			<div class="input size-normal">
				<label for="groomsman2-fn">First name</label>
				<input type="text" name="groomsman2-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="groomsman2-ln">Last name</label>
				<input type="text" name="groomsman2-ln">
			</div>
			<div class="input size-normal">
				<label for="groomsman3-fn">First name</label>
				<input type="text" name="groomsman3-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="groomsman3-ln">Last name</label>
				<input type="text" name="groomsman3-ln">
			</div>
			<div class="input size-normal">
				<label for="groomsman4-fn">First name</label>
				<input type="text" name="groomsman4-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="groomsman4-ln">Last name</label>
				<input type="text" name="groomsman4-ln">
			</div>
			<div class="input size-normal">
				<label for="groomsman5-fn">First name</label>
				<input type="text" name="groomsman5-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="groomsman5-ln">Last name</label>
				<input type="text" name="groomsman5-ln">
			</div>
			<div class="input size-normal">
				<label for="groomsman6-fn">First name</label>
				<input type="text" name="groomsman6-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="groomsman6-ln">Last name</label>
				<input type="text" name="groomsman6-ln">
			</div>
		</div>


		<div class="input-group multi-names">
			<h3>Flower Girl</h3>
			<div class="input size-normal">
				<label for="flowerGirl1-fn">First name</label>
				<input type="text" name="flowerGirl1-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="flowerGirl1-ln">Last name</label>
				<input type="text" name="flowerGirl1-ln">
			</div>
			<div class="input size-normal">
				<label for="flowerGirl2-fn">First name</label>
				<input type="text" name="flowerGirl2-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="flowerGirl2-ln">Last name</label>
				<input type="text" name="flowerGirl2-ln">
			</div>
		</div>

		<div class="input-group multi-names">
			<h3>Ring Bearer</h3>
			<div class="input size-normal">
				<label for="ringBearer1-fn">First name</label>
				<input type="text" name="ringBearer1-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="ringBearer1-ln">Last name</label>
				<input type="text" name="ringBearer1-ln">
			</div>
			<div class="input size-normal">
				<label for="ringBearer2-fn">First name</label>
				<input type="text" name="ringBearer2-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="ringBearer2-ln">Last name</label>
				<input type="text" name="ringBearer2-ln">
			</div>
		</div>


		<div class="input-group">
			<h3>Officiant</h3>
			<div class="input size-normal">
				<label for="officiant-fn">First name</label>
				<input type="text" name="officiant-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="officiant-ln">Last name</label>
				<input type="text" name="officiant-ln">
			</div>
		</div>

		<div class="input-group multi-names">
			<h3>Parents of the Bride</h3>
			<div class="input size-normal">
				<label for="parentBride1-fn">First name</label>
				<input type="text" name="parentBride1-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="parentBride1-ln">Last name</label>
				<input type="text" name="parentBride1-ln">
			</div>
			<div class="input size-normal">
				<label for="parentBride2-fn">First name</label>
				<input type="text" name="parentBride2-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="parentBride2-ln">Last name</label>
				<input type="text" name="parentBride2-ln">
			</div>
		</div>

		<div class="input-group multi-names">
			<h3>Parents of the Groom</h3>
			<div class="input size-normal">
				<label for="parentGroom1-fn">First name</label>
				<input type="text" name="parentGroom1-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="parentGroom1-ln">Last name</label>
				<input type="text" name="parentGroom1-ln">
			</div>
			<div class="input size-normal">
				<label for="parentGroom2-fn">First name</label>
				<input type="text" name="parentGroom2-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="parentGroom2-ln">Last name</label>
				<input type="text" name="parentGroom2-ln">
			</div>
		</div>

		<div class="input-group multi-names">
			<h3>Grandparents</h3>
			<div class="input size-normal">
				<label for="grandparent1-fn">First name</label>
				<input type="text" name="grandparent1-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="grandparent1-ln">Last name</label>
				<input type="text" name="grandparent1-ln">
			</div>
			<div class="input size-normal">
				<label for="grandparent2-fn">First name</label>
				<input type="text" name="grandparent2-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="grandparent2-ln">Last name</label>
				<input type="text" name="grandparent2-ln">
			</div>
			<div class="input size-normal">
				<label for="grandparent3-fn">First name</label>
				<input type="text" name="grandparent3-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="grandparent3-ln">Last name</label>
				<input type="text" name="grandparent3-ln">
			</div>
			<div class="input size-normal">
				<label for="grandparent4-fn">First name</label>
				<input type="text" name="grandparent4-fn">
				<i class="fa-solid fa-user"></i>
			</div>
			<div class="input size-normal">
				<label for="grandparent4-ln">Last name</label>
				<input type="text" name="grandparent4-ln">
			</div>
	</div> -->
		<input class="button-hover" type="submit" name="submit">
	</form>
</div>
<?php include 'includes/copyright.php';
	include 'includes/footer.php';
?>
