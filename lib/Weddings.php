<?php
class Weddings extends Database {
    // Create a new wedding
    public function createWedding($weddingData) {
        $columns = implode(", ", array_keys($weddingData));
        $placeholders = ":" . implode(", :", array_keys($weddingData));
        $sql = "INSERT INTO weddings ($columns) VALUES ($placeholders)";
        $this->query($sql);
        
        foreach ($weddingData as $key => $value) {
            $this->bind(":$key", $value);
        }
        $this->execute();
        return $this->getLastId(); // Return the ID of the newly created wedding
    }

    // Read wedding information by ID
    public function getWeddingById($weddingId) {
        $this->query("SELECT * FROM weddings WHERE wedding_id = :wedding_id");
        $this->bind(":wedding_id", $weddingId);
        return $this->getResult(); // Return the wedding details
    }

    // Update wedding information
    public function updateWedding($weddingId, $weddingData) {
        $set = "";
        foreach ($weddingData as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", "); // Remove the last comma
        $sql = "UPDATE weddings SET $set WHERE wedding_id = :wedding_id";
        $this->query($sql);
        
        foreach ($weddingData as $key => $value) {
            $this->bind(":$key", $value);
        }
        $this->bind(":wedding_id", $weddingId);
        $this->execute(); // Execute the update
    }

    // Delete a wedding
    public function deleteWedding($weddingId) {
        $this->query("DELETE FROM weddings WHERE wedding_id = :wedding_id");
        $this->bind(":wedding_id", $weddingId);
        $this->execute(); // Execute the delete
    }

    // Custom functions -------> :>
    // Get wedding ID by key and password
    public function getWeddingByKeyAndPassword($weddingKey, $password) {
        $this->query("SELECT * FROM weddings WHERE wedding_key = :wedding_key AND password = :password");
        $this->bind(":wedding_key", $weddingKey);
        $this->bind(":password", $password);
        return $this->getResult(); // Return the wedding details if found
    }
    // Read wedding info for weddings page
    public function getAllWeddings_openersInfo($status) {
        switch ($status) {
            case 'held':
                $this->query("
                    SELECT 
                        role_assignments.wedding_id, participants.first_name, weddings.wedding_photo 
                    FROM
                        ((role_assignments INNER JOIN weddings ON role_assignments.wedding_id = weddings.wedding_id) 
                        INNER JOIN roles ON role_assignments.role_id = roles.role_id) 
                        INNER JOIN participants ON role_assignments.participant_id = participants.participant_id
                    WHERE 
                        roles.role_name IN ('Bride','Groom') AND weddings.wedding_date < NOW() 
                    ORDER BY 
                        weddings.wedding_id
                ");
                break;
    
            case 'upcomming':
                $this->query("
                    SELECT 
                        role_assignments.wedding_id, participants.first_name, participants.last_name, weddings.wedding_photo 
                    FROM
                        ((role_assignments INNER JOIN weddings ON role_assignments.wedding_id = weddings.wedding_id) 
                        INNER JOIN roles ON role_assignments.role_id = roles.role_id) 
                        INNER JOIN participants ON role_assignments.participant_id = participants.participant_id
                    WHERE 
                        roles.role_name IN ('Bride','Groom') AND weddings.wedding_date > NOW() 
                    ORDER BY 
                        weddings.wedding_id
                ");
                break;
    
            default:
                $this->query("
                    SELECT 
                        role_assignments.wedding_id, participants.first_name, participants.last_name, weddings.wedding_photo 
                    FROM
                        ((role_assignments INNER JOIN weddings ON role_assignments.wedding_id = weddings.wedding_id) 
                        INNER JOIN roles ON role_assignments.role_id = roles.role_id) 
                        INNER JOIN participants ON role_assignments.participant_id = participants.participant_id
                    WHERE 
                        roles.role_name IN ('Bride','Groom') 
                    ORDER BY 
                        weddings.wedding_id
                ");
                break;
        }
    
        return $this->getResults(); // Return the results
    }
}
?>