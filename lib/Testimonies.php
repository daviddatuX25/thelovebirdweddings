<?php
class Testimonies extends Database {
    // Create a new testimony
    public function createTestimony($roleAssignmentID, $comment, $ratings) {
        $this->query("
            INSERT INTO testimonies (role_assignment_id, comment, ratings) 
            VALUES (:role_assignment_id, :comment, :ratings)
        ");
        $this->bind(':role_assignment_id', $roleAssignmentID);
        $this->bind(':comment', $comment);
        $this->bind(':ratings',$ratings);
        $this->execute();
        return $this->getLastId(); 
    }

    // Read all testimonies 
    public function getTestimonies($limit){
        $this->query("
        SELECT testimonies.*, participants.photo, participants.first_name, participants.last_name 
        FROM (testimonies INNER JOIN role_assignments ON testimonies.role_assignment_id = role_assignments.assignment_id) INNER JOIN participants ON role_assignments.participant_id = participants.participant_id
        LIMIT :limit;
        ");
        $this->bind("limit",$limit);
    return $this->getResults();
    }

    // Update testimony information
    public function updateTestimony($testimonyId, $roleAssignmentID, $comment, $ratings) {
        // Prepare the SQL query to update the testimony
        $this->query("
            UPDATE testimonies
            SET role_assignment_id = :role_assignment_id, 
                comment = :comment, 
                ratings = :ratings
            WHERE testimony_id = :testimony_id
        ");
        
        // Bind the input parameters
        $this->bind(':role_assignment_id', $roleAssignmentID);
        $this->bind(':comment', $comment);
        $this->bind(':ratings', $ratings);  // Note the correction of the variable name to $ratings
        $this->bind(':testimony_id', $testimonyId);  // Bind the testimonyId for the WHERE clause
        
        // Execute the query
        $this->execute();
    }
    

    // Delete a testimony
    public function deleteTestimony($testimonyId) {
        $this->query("DELETE FROM testimonies WHERE testimony_id = :testimony_id");
        $this->bind(":testimony_id", $testimonyId);
        $this->execute(); // Execute the delete
    }

    // Custom Functions -----> :>
    public function getTestimoniesByWedId($wedding_id, $limit){
		$this->query("
			SELECT testimonies.*, participants.photo, participants.first_name, participants.last_name 
			FROM (testimonies INNER JOIN role_assignments ON testimonies.role_assignment_id = role_assignments.assignment_id) INNER JOIN participants ON role_assignments.participant_id = participants.participant_id
			WHERE role_assignments.wedding_id = :wed_id
			LIMIT :limit
			");
		$this->bind("limit",$limit);
		$this->bind("wed_id",$wedding_id);
	    return $this->getResults();
	}
    
    public function getEmptyTestimonies($wedding_id){
        $this->query("
            SELECT role_assignments.assignment_id, participants.first_name, participants.last_name
			FROM (testimonies RIGHT JOIN role_assignments ON testimonies.role_assignment_id = role_assignments.assignment_id) RIGHT JOIN participants ON role_assignments.participant_id = participants.participant_id
			WHERE role_assignments.wedding_id = :wedding_id
            AND testimonies.role_assignment_id IS NULL;
        ");
        $this->bind(":wedding_id", $wedding_id);
        return $this->getResults();
    }

    public function getAdminTestimonies($wedding_id){
        $this->query("
            SELECT role_assignments.assignment_id, participants.first_name, participants.last_name, testimonies.comment, testimonies.ratings 
			FROM (testimonies RIGHT JOIN role_assignments ON testimonies.role_assignment_id = role_assignments.assignment_id) RIGHT JOIN participants ON role_assignments.participant_id = participants.participant_id
			WHERE role_assignments.wedding_id = :wedding_id
        ");
        $this->bind(":wedding_id", $wedding_id);
        return $this->getResults();
    }

    public function getTestimonyIdByRoleAssignments($assignment_id){
        $this->query("
        SELECT testimonies.testimony_id
        FROM testimonies INNER JOIN role_assignments ON testimonies.role_assignment_id = role_assignments.assignment_id
        WHERE role_assignments.assignment_id = :assignment_id
        ");
        $this->bind(":assignment_id", $assignment_id);
        return $this->getResult();
    }
    
    
}
?>