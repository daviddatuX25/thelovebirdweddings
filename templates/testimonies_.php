<?php 
$nav_isActive = array("testimoniesPage"=>"active","weddingEventsPage"=>"","aboutPage"=>"");
include 'includes/header.php';?>
<link rel="stylesheet" href="templates/includes/css/create_wedding.css">
<style>
    #rating-slider {
        width: 35rem;
        margin: 4rem 0;
    }
    #rating{
        font-size: var(--p-fontsize);
        display: block;
    }
    .rating-value-set{
        font-size: var(--h4-fontsize);
        position:absolute;
        top: 0;
        left:50%;
        transform: translateX(-50%)
    }
    #rating-value{
        font-weight: bold;
        color: var(--brandColor);
    }
    .rating-group{
        display: flex;
        flex-direction: column;
    }
    .rating-group #assignment_id{
        width: 50rem;
    }

    .input-group{
        flex-direction: column; 
        margin-bottom: 20rem;
    }
    .button-grouped{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 1.2rem;
    }

    section.main{
        margin-bottom: 2rem;
    }
</style>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const slider = document.getElementById("rating-slider");
    const ratingValue = document.getElementById("rating-value");
    const commentTextarea = document.getElementById("comment");
    const assignmentSelect = document.getElementById("assignment_id");

    // JSON data from PHP to populate fields
    const testimoniesData = <?php echo json_encode($emptyTestimonies); ?>;
    console.log(testimoniesData);

    // Function to update the fields based on selected user
    function updateFields() {
        const selectedId = assignmentSelect.value;
        const selectedTestimony = testimoniesData.find(item => item.assignment_id == selectedId);

        if (selectedTestimony) {
            slider.value = selectedTestimony.ratings || 5;
            ratingValue.textContent = slider.value;
            commentTextarea.value = selectedTestimony.comment || "";
        } else {
            slider.value = 5;
            ratingValue.textContent = "5";
            commentTextarea.value = "";
        }
    }

    // Update fields when the dropdown value changes
    assignmentSelect.addEventListener("change", updateFields);

    // Update the displayed rating value in real-time as the slider is adjusted
    slider.addEventListener("input", () => {
        ratingValue.textContent = slider.value;
    });

    // Initialize fields on page load
    updateFields();
});
</script>
<?php include 'includes/main-nav.php';?>

<section class="main">
    
    <?php 
    if(isset($testimonies)):
    foreach($testimonies as $testimony):?>
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
					    if ($ratings - $star == 0.5) {
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
    <?php 
    endforeach;
    endif;
    ?>
</section>
<section>
<?php 
    if(isset($_SESSION['wedding_id'])):?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="input-group rating-group">
        <div class="input">
            <label for="assignment_id">Name</label>
            <select name="assignment_id" id="assignment_id">
                <?php foreach($emptyTestimonies as $roleAssignment): ?>
                <option value="<?php echo $roleAssignment->assignment_id;?>">
                <?php echo $roleAssignment->first_name . " " . $roleAssignment->last_name;?>
                </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="input" id="rating">
            <label for="rating-slider">Rating</label>
            <input type="range" name="ratings" id="rating-slider" min="0" max="5" step="0.5" value="5">
            <div class="rating-value-set">
                <span id="rating-value">2.5</span>/5
            </div>
        </div>
        <div class="input">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
        </div>
        <?php if($admin):?>
            <div class="button-grouped">
                <button class="button button-hover" type="submit" name="render_testimony">Render</button>
                <button class="button button-hover" type="submit" name="delete_testimony">Delete</button>
            </div>
        <?php else:?>
            <button class="button button-hover" type="submit" name="create_testimony">Create Testimony</button>
        <?php endif;?>
    </div>
    </form>
    <?php endif;?>
</section>
<section>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <?php if(!isset($_SESSION['wedding_id']) && isset($_GET['wedding_id'])):?>
        <input type="hidden" name="wedding_id" value="<?php echo $_GET['wedding_id'];?>">
        <div class="input-group">
            <h3>Add Testimonies</h3>
            <div class="input size-small">
                <label for="wedding_key">Wedding Key</label>
                <input id="wedding_key"type="text" name="wedding_key">
				<i class="fa-solid fa-key"></i>
            </div>
    		<input class="button button-hover" type="submit" name="submit" value="Log in">
        </div>
    <?php endif;?>
</form>
</section>


<?php 
include 'includes/bookNow-footer.php';
include 'includes/copyright.php';?>
<?php include 'includes/footer.php';?>
