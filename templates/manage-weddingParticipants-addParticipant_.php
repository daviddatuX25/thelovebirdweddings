<?php
include 'includes/header.php';
$nav_isActive = array("participantsPage" => "active");
include 'includes/manage-nav.php';
?>
<style>
    h2 {
        text-align: center;
    }
</style>
<main>
    <h2>Add new participant</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <div class="input size-normal">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="input size-normal">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="input size-normal">
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday">
            </div>
            <div class="input size-normal">
                <label for="contact_no">Contact No:</label>
                <input type="text" name="contact_no">
            </div>
            <div class="input size-normal">
                <label for="barangay">Barangay:</label>
                <input type="text" name="barangay">
            </div>
            <div class="input size-normal">
                <label for="city">City:</label>
                <input type="text" name="city">
            </div>
            <div class="input size-normal">
                <label for="province">Province:</label>
                <input type="text" name="province">
            </div>
            <div class="input size-normal">
                <label for="role_id">Role:</label>
                <select name="role_id" required>
                    <option value="">Select Role</option>
                    <?php foreach ($roles as $role): ?>
                        <option value="<?php echo $role->role_id; ?>"><?php echo htmlspecialchars($role->role_name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input size-normal">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" accept="image/*">
            </div>
        </div>
        <button type="submit" class="button button-hover">Add Participant</button>
    </form>
</main>

<?php
include 'includes/footer.php';
?>