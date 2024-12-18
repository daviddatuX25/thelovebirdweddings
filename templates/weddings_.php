<?php 
$nav_isActive = array("testimoniesPage"=>"","weddingEventsPage"=>"active","aboutPage"=>"");
include 'includes/header.php';
include 'includes/header-welcome.php';
include 'includes/main-nav.php';

$sort_isActive = array("upcomming"=>"", "held"=>"");
if (isset($_GET['sort'])){
	switch ($_GET['sort']) {
	case 'upcomming':
		$sort_isActive['upcomming'] = "active";
		break;
	case 'held':
		$sort_isActive['held'] = "active";
		break;
	default:
		break;
	}
}
?>

<ul class="nav subnav">
	<li class="<?php echo $sort_isActive["upcomming"];?>">
		<a href="<?php echo "index.php?sort=upcomming";?>">Upcomming</a>
	</li>
	<li class="<?php echo $sort_isActive["held"];?>">
		<a href="<?php echo "index.php?sort=held";?>">Held</a>
	</li>
</ul>
<section class="main">
	<?php 
	$groupedPartners = [];
	foreach($weddings as $wedding){
		$groupedPartners[$wedding->wedding_id][] = $wedding;
	}

	foreach($groupedPartners as $weddingID => $participant):
		$weddingID = htmlspecialchars($weddingID);
		?>
		<div class="event">
			<div class="img-container">
				<img src="<?php echo $participant[0]->couple_photo;?>" alt="couple image">
			</div>
			<h3>
				<?php echo $participant[0]->first_name . " x " . $participant[1]->first_name;?>
			</h3>			
			<a class="button button-hover" href="./wedding-event.php?wedding_id=<?php echo $weddingID;?>"> View event</a>
		</div>
	<?php endforeach;?>

</section>


<?php 
include 'includes/bookNow-footer.php';
include 'includes/copyright.php';?>
<?php include 'includes/footer.php';?>
