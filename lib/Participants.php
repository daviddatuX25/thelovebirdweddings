<?php
class Participants extends Database {
    // Create a new participant
    public function createParticipant($participantData) {
        $this->query("INSERT INTO participants (first_name, last_name) VALUES (:first_name, :last_name)");
        $this->bind(":first_name", $participantData['first_name']);
        $this->bind(":last_name", $participantData['last_name']);
        $this->execute();
        return $this->getLastId(); // Return the ID of the newly created participant
    }

    // Read participant information by ID
    public function getParticipantById($participantId) {
        $this->query("SELECT * FROM participants WHERE participant_id = :participant_id");
        $this->bind(":participant_id", $participantId);
        return $this->getResult(); // Return the participant details
    }

    // Update participant information
    public function updateParticipant($participantId, $participantData) {
        $this->query("UPDATE participants SET first_name = :first_name, last_name = :last_name WHERE participant_id = :participant_id");
        $this->bind(":first_name", $participantData['first_name']);
        $this->bind(":last_name", $participantData['last_name']);
        $this->bind(":participant_id", $participantId);
        $this->execute(); // Execute the update
    }

    // Delete a participant
    public function deleteParticipant($participantId) {
        $this->query("DELETE FROM participants WHERE participant_id = :participant_id");
        $this->bind(":participant_id", $participantId);
        $this->execute(); // Execute the delete
    }

    // Custom functions ----- :>

    public function getWeddingParticipants($weddingId) {
        $this->query("
            SELECT participants.*, roles.role_name 
            FROM role_assignments 
            INNER JOIN participants ON role_assignments.participant_id = participants.participant_id 
            INNER JOIN roles ON role_assignments.role_id = roles.role_id 
            WHERE role_assignments.wedding_id = :wedding_id
        ");
        $this->bind(":wedding_id", $weddingId);
        return $this->getResults(); // Return participants for the specific wedding
    }
}
?>