<?php
include 'includes/header.php';
$nav_isActive = array("managePage"=>"active");
include 'includes/manage-nav.php';
?>
<main>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="input-group">
            <div class="input size-normal">
                <label for="wedding_key">Wedding Key:</label>
                <input type="text" name="wedding_key" required>
				<i class="fa-solid fa-key"></i>
            </div>
            <div class="input size-normal">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
        </div>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <input class="button-hover" type="submit" value="Login">
    </form>
</main>
<?php
include 'includes/footer.php';
?>