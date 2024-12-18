<?php
include 'includes/header.php';
$nav_isActive = Array("detailsPage" => "active");
include 'includes/manage-nav.php';
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <input type="hidden" name="wedding_id" value="<?php echo $weddingInformation->wedding_id; ?>">
    
    <div class="input-group">
        <div class="input size-small">
            <label for="wedding_date">Wedding Date</label>
            <input type="date" name="wedding_date" value="<?php echo $weddingInformation->wedding_date; ?>" required>
        </div>
    </div>
    
    <div class="input-group">
        <div class="input size-large">
            <label for="description">Description</label>
            <textarea name="description" required><?php echo $weddingInformation->description; ?></textarea>
        </div>
    </div>
    
    <div class="input-group">
        <div class="input size-large">
            <label for="theme-select">Theme</label>
            <select name="theme_id" id="theme-select" class="theme-dropdown">
                <?php foreach($themes as $theme): ?>
                    <option value="<?php echo $theme->theme_id; ?>"
                        <?php echo ($weddingInformation->theme_id == $theme->theme_id) ? ' selected' : ''; ?>>
                        <?php echo $theme->theme_name; ?> theme
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="input-group">
        <div class="input">
        <input type="color" name="theme_color" value="<?php echo $weddingInformation->theme_color; ?>" required>
            <label for="theme_color">Theme Color</label>
        </div>
    </div>
    
    <div class="input-group">
        <div class="input size-normal">
            <label for="wedding_location">Wedding Location</label>
            <input list="weddingLocations" type="text" name="wedding_location" value="<?php echo $weddingInformation->wedding_location; ?>" required>
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
        </div>
    </div>
    
    <div class="input-group">
        <div class="input size-normal">
            <label for="prenup_location">Prenup Location</label>
            <input type="text" name="prenup_location" value="<?php echo $weddingInformation->prenup_location; ?>" required>
        </div>
    </div>
    
    <div class="input-group">
        <div class="input size-normal">
            <label for="mobile_number">Mobile Number</label>
            <input type="text" name="mobile_number" value="<?php echo $weddingInformation->mobile_number; ?>" required>
        </div>
    </div>
    
    <div class="input-group">
        <div class="input size-normal">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address" value="<?php echo $weddingInformation->email_address; ?>" required>
        </div>
    </div>

    <div class="input-group">
        <div class="input size-small">
            <label for="couple_image">Couple Image</label>
            <input type="file" name="couple_image" accept="image/*">
        </div>
    </div>

    <div class="input-group">
        <div class="input size-small">
            <label for="marriage_image">Marriage Image</label>
            <input type="file" name="marriage_image" accept="image/*">
        </div>
    </div>

    <div class="input-group">
        <div class="input size-small">
            <label for="prenup_image">Prenup Image</label>
            <input type="file" name="prenup_image" accept="image/*">
        </div>
    </div>

    <input class="button-hover" type="submit" name="update_wedding" value="Update Wedding">
</form>
<div class="manage-buttons">
    <form action="wedding-event.php" method="GET">
        <input type="hidden" name="wedding_id" value="<?php echo $weddingInformation->wedding_id; ?>">
        <input class="button-hover" type="submit" value="View Wedding">
    </form>
    <form method="POST" action="">
        <input type="hidden" name="wedding_id" value="<?php echo $weddingInformation->wedding_id; ?>">
        <input class="button-hover" type="submit" name="delete" value="Delete Wedding">
    </form>
</div>

<?php
include 'includes/copyright.php';
include 'includes/footer.php';
?>