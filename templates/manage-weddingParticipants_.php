<?php
include 'includes/header.php';
$nav_isActive = array("participantsPage" => "active");
include 'includes/manage-nav.php';
?>
<style>
main h2{
    text-align:center;
    margin-top: 10rem;
}
.input-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 2rem;
    margin: 2rem 0;
}

.input-group form {
    flex: 1 1 calc(33.333% - 2rem); /* Three forms per row with spacing */
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-width: 280px; /* Ensures forms don’t shrink too small */
}

main .input-group form .participant .button{
    margin: 5px auto;
    width: 17rem;
    display: block;
    font-size: 2.5rem;
}

.fixed-button span{
    font-size: 2.75rem;
}
.button-grouped{
    margin-left:1.7rem;
    display: grid;
    grid-gap:2rem;
    grid-template-columns:1fr 1fr;
}
</style>
<main>
<?php foreach($weddingRolesAndParticipants as $roleName => $participants): ?>
    <h2><?php echo $roleName; ?></h2>
    <div class="input-group multi-names">
    <?php foreach ($participants as $index => $participant): ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
            <div class="participant" data-index="<?php echo $index; ?>">
                <input type="hidden" name="participant_id" value="<?php echo $participant->id ?? ''; ?>">
                <input type="hidden" name="role_name" value="<?php echo $roleName;?>">
                <input type="hidden" name="role_id" value="<?php echo $RolesDB->getRoleIdByName($roleName); ?>">
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-fn-<?php echo $index; ?>">First Name</label>
                    <input type="text" id="<?php echo $roleName; ?>-fn-<?php echo $index; ?>" name="first_name" value="<?php echo htmlspecialchars($participant->first_name); ?>">
                    <?php
                        if($roleName == "Bride" ){
                            echo "<img class='partnersIcon' src='templates/includes/images/bride.png'>";
                        } else if($roleName == "Groom")
                            echo "<img class='partnersIcon' src='templates/includes/images/groom.png'>";
                        else {
                            echo "<i class='fa-solid fa-user'></i>";

                        }
                    ?>
                </div>
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-ln-<?php echo $index; ?>">Last Name</label>
                    <input type="text" id="<?php echo $roleName; ?>-ln-<?php echo $index; ?>" name="last_name" value="<?php echo htmlspecialchars($participant->last_name); ?>">
                </div>
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-bday-<?php echo $index; ?>">Birthday</label>
                    <input type="date" id="<?php echo $roleName; ?>-bday-<?php echo $index; ?>" name="birthday" value="<?php echo htmlspecialchars($participant->birthday); ?>">
                </div>
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-contact-<?php echo $index; ?>">Contact No</label>
                    <input type="text" id="<?php echo $roleName; ?>-contact-<?php echo $index; ?>" name="contact_no" value="<?php echo htmlspecialchars($participant->contact_no); ?>">
                </div>
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-barangay-<?php echo $index; ?>">Barangay</label>
                    <input type="text" id="<?php echo $roleName; ?>-barangay-<?php echo $index; ?>" name="barangay" value="<?php echo htmlspecialchars($participant->barangay); ?>">
                </div>
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-city-<?php echo $index; ?>">City</label>
                    <input type="text" id="<?php echo $roleName; ?>-city-<?php echo $index; ?>" name="city" value="<?php echo htmlspecialchars($participant->city); ?>">
                </div>
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-province-<?php echo $index; ?>">Province</label>
                    <input type="text" id="<?php echo $roleName; ?>-province-<?php echo $index; ?>" name="province" value="<?php echo htmlspecialchars($participant->province); ?>">
                </div>
                <div class="input size-normal">
                    <label for="<?php echo $roleName; ?>-photo-<?php echo $index; ?>">Photo</label>
                    <input type="file" id="<?php echo $roleName; ?>-photo-<?php echo $index; ?>" name="photo">
                </div>

                <!-- Submit button for updating this specific participant -->
                <div class="button-grouped">
                    <button class="button button-hover" type="submit" name="update_participant" value="<?php echo $participant->participant_id; ?>">Update</button>
                    <button class="button button-hover" type="submit" name="delete_participant" value="<?php echo $participant->participant_id; ?>">Delete</button>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
    </div>
<?php endforeach; ?>
</main>
<footer class="fixed-button button-hover">
	<a href="manage-weddingParticipants-addParticipant.php">
		<span>Add Participant</span>
		<i class="fa fa-arrow-circle-o-right"></i>
	</a>
</footer>
<?php
include 'includes/footer.php';
?>
