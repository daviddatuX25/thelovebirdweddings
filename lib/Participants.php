<?php
class Participants extends Database {
    // Create a new participant
    public function createParticipant($participantData) {
        $this->query("INSERT INTO participants (first_name, last_name, birthday, contact_no, barangay, city, province, photo) 
                      VALUES (:first_name, :last_name, :birthday, :contact_no, :barangay, :city, :province, :photo)");
    
        $this->bind(":first_name", $participantData['first_name']);
        $this->bind(":last_name", $participantData['last_name']);
        
        $this->bind(":birthday", $participantData['birthday'] ?? null);
        $this->bind(":contact_no", $participantData['contact_no'] ?? null);
        $this->bind(":barangay", $participantData['barangay'] ?? null);
        $this->bind(":city", $participantData['city'] ?? null);
        $this->bind(":province", $participantData['province'] ?? null);
        $this->bind(":photo", $participantData['photo'] ?? null); // Assuming photo is a string path


        $this->execute();
        
        return $this->getLastId();
    }

    // Read participant information by ID
    public function getParticipantById($participantId) {
        $this->query("SELECT * FROM participants WHERE participant_id = :participant_id");
        $this->bind(":participant_id", $participantId);
        return $this->getResult(); // Return the participant details
    }

    // Update participant information
    public function updateParticipant($participantId, $participantData) {
        // Prepare the SQL query to update participant information
        $this->query("UPDATE participants 
            SET first_name = :first_name, 
                last_name = :last_name, 
                birthday = :birthday, 
                contact_no = :contact_no, 
                barangay = :barangay, 
                city = :city, 
                province = :province, 
                photo = :photo
            WHERE participant_id = :participant_id
        ");
    
        // Bind the values from the participantData array to the query
        $this->bind(":first_name", $participantData['first_name']);
        $this->bind(":last_name", $participantData['last_name']);
        $this->bind(":birthday", $participantData['birthday']);
        $this->bind(":contact_no", $participantData['contact_no']);
        $this->bind(":barangay", $participantData['barangay']);
        $this->bind(":city", $participantData['city']);
        $this->bind(":province", $participantData['province']);
        $this->bind(":photo", $participantData['photo']);  // Photo is optional, it can be null if no photo is uploaded
        $this->bind(":participant_id", $participantId);
        var_dump($participantId);
        // Execute the query to update the participant in the database
        $this->execute();
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

    public function getWeddingRolesAndParticipants($weddingId) {
        $this->query("
            SELECT roles.role_name, participants.*
            FROM roles
            LEFT JOIN role_assignments ON roles.role_id = role_assignments.role_id
            LEFT JOIN participants ON role_assignments.participant_id = participants.participant_id
            WHERE role_assignments.wedding_id = :wedding_id
            ORDER BY 
                CASE roles.role_name
                    WHEN 'Bride' THEN 1
                    WHEN 'Groom' THEN 2
                    ELSE 3
                END,
                roles.role_name,
                participants.first_name;
            ");
        $this->bind(":wedding_id", $weddingId);
        return $this->getResults(); // Return participants for the specific wedding
    }
    

}
?>