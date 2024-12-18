<?php
include 'includes/header.php';
$nav_isActive = array("testimoniesPage"=>"","weddingEventsPage"=>"active","aboutPage"=>"");
include 'includes/main-nav.php';

$partners = [];
$otherParticipantRoles = [];
	foreach($weddingParticipants as $participant){
		if($participant->role_name == "Bride"){
			$partners["Bride"] = $participant;
		} else if($participant->role_name == "Groom"){
			$partners["Groom"] = $participant;
		} else{
			$otherParticipantRoles[$participant->role_name][] = $participant; 
		}
	}
?>
<section class="wedDate">
		<h2><?php echo date("F j, Y",strtotime($weddingInformation->wedding_date)); ?></h2>
	</section>
	<section class="couple_opener">
		<img src="<?php echo $partners["Bride"]->photo;?>" alt="Bride">
		<h2>
			<span class="bride"><?php echo $partners["Bride"]->first_name;?></span>
				<span> & </span> 
				<span class="groom"><?php echo $partners["Groom"]->first_name;?></span>
		</h2>
		<img src="<?php echo $partners["Groom"]->photo;?>" alt="Groom">
	</section>
	<section class="theme">
		<h2>Theme</h2>
		<p><?php echo $weddingTheme->getThemeById($weddingInformation->theme_id)->theme_name;?> wedding</p>
	</section>
	<div>
		<section class="location combo">
			<img class="combo-img" src="<?php echo $weddingInformation->wedding_photo?>" alt="wedding location">
			<div class="combo-txt">
				<h2>Location</h2>
				<p><?php echo $weddingInformation->wedding_location;?></p>  
			</div>
		</section>
		<section class="prenup combo combo-reverse">
			<img class="combo-img" src="<?php echo $weddingInformation->prenup_photo?>" alt="prenup location">
			<div class="combo-txt">
				<h2>Prenup</h2>
				<p><?php echo $weddingInformation->prenup_location;?></p>
			</div>
		</section>

		<?php
		foreach($otherParticipantRoles as $role => $participants):
			if(!empty($participants)):
		?>
		<section class="participants">
			<h2><?php echo htmlspecialchars($role);?></h2>
			<ul class="names">
				<?php foreach($participants as $participant):?>
					<li><?php echo $participant->first_name . " " . $participant->last_name;?></li>
				<?php endforeach;?>
			</ul>
		</section>
		<?php 
		endif;
		endforeach;?>
		<section>
			<h2 class="testimonies">
				<a href="testimonies.php?wedding_id=<?php echo $weddingInformation->wedding_id?>">>> Our Testimonies <<</a>
			</h2>
		</section>
		
		</section>
		<img class="themeFooter" src="templates/includes/images/themes/<?php echo $weddingInformation->theme_name;?>/footer.png" alt="footer design">
	</div>

<?php 
	include 'includes/bookNow-footer.php';
	include 'includes/footer.php';
?>