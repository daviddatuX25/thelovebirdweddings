<?php
class Testimonies extends Database {
    // Create a new testimony
    public function createTestimony($testimonyData) {
        $this->query("INSERT INTO testimonies (wedding_id, content, author_name) VALUES (:wedding_id, :content, :author_name)");
        $this->bind(":wedding_id", $testimonyData['wedding_id']);
        $this->bind(":content", $testimonyData['content']);
        $this->bind(":author_name", $testimonyData['author_name']);
        $this->execute(); // Execute the insert
        return $this->getLastId(); // Return the ID of the newly created testimony
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

    public function getAllTestimonies($limit){
		$this->query("
			SELECT testimonies.*, participants.photo, participants.first_name, participants.last_name 
			FROM (testimonies INNER JOIN role_assignments ON testimonies.role_assignment_id = role_assignments.assignment_id) INNER JOIN participants ON role_assignments.participant_id = participants.participant_id
			LIMIT :limit;
			");
		$this->bind("limit",$limit);
	    return $this->getResults();
	}

    // Update testimony information
    public function updateTestimony($testimonyId, $testimonyData) {
        $this->query("UPDATE testimonies SET content = :content WHERE testimony_id = :testimony_id");
        $this->bind(":content", $testimonyData['content']);
        $this->bind(":testimony_id", $testimonyId);
        $this->execute(); // Execute the update
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
}
?>