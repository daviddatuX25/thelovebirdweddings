<?php 
$nav_isActive = array("testimoniesPage"=>"active","weddingEventsPage"=>"","aboutPage"=>"");
include 'includes/header.php';?>
<?php include 'includes/main-nav.php';?>

<section class="main">
	<?php foreach($testimonies as $testimony):?>

    <div class="review">
        <img class="review-img" src="clients/<?php echo $testimony->photo;?>" alt="person review">
        <div class="review-content">
            <p class="review-txt"><?php echo $testimony->comment;?></p>
            <h4 class="name"><?php echo $testimony->first_name . " " . $testimony->last_name;?></h4>
            <div class="star-quote">
                <div class="stars">
                	<?php 
                	$ratings = (float)$testimony->ratings;
                
					for ($star = 0; $star < $ratings; $star++) {
					    if ($ratings-$star == 0.5) {
					        echo '<i class="fa-solid fa-star-half-stroke"></i>'; 
					    } else {
					        echo '<i class="fa-solid fa-star"></i>';
					    }
					}
					;?>

                </div>
                <i class="fa-solid fa-quote-right"></i>
            </div>
        </div>
    </div>

	<?php endforeach;?>
</section>

<?php 
include 'includes/bookNow-footer.php';
include 'includes/copyright.php';?>
<?php include 'includes/footer.php';?>
