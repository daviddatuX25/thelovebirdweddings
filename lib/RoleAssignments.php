<?php
class RoleAssignments extends Database {
    // Create a new role assignment
    public function createRoleAssignment($weddingId, $participantId, $roleId) {
        $this->query("INSERT INTO role_assignments (wedding_id, participant_id, role_id) VALUES (:wedding_id, :participant_id, :role_id)");
        $this->bind(":wedding_id", $weddingId);
        $this->bind(":participant_id", $participantId);
        $this->bind(":role_id", $roleId);
        $this->execute(); // Execute the insert
        return $this->getLastId(); // Return the ID of the newly created role assignment
    }

    // Read all role assignments for a specific wedding
    public function getRoleAssignmentsByWeddingId($weddingId) {
        $this->query("SELECT * FROM role_assignments WHERE wedding_id = :wedding_id");
        $this->bind(":wedding_id", $weddingId);
        return $this->getResults(); // Return all role assignments for the specific wedding
    }

    // Read a specific role assignment by ID
    public function getRoleAssignmentById($assignmentId) {
        $this->query("SELECT * FROM role_assignments WHERE assignment_id = :assignment_id");
        $this->bind(":assignment_id", $assignmentId);
        return $this->getResult(); // Return the role assignment details
    }

    // Update a role assignment
    public function updateRoleAssignment($assignmentId, $weddingId, $participantId, $roleId) {
        $this->query("UPDATE role_assignments SET wedding_id = :wedding_id, participant_id = :participant_id, role_id = :role_id WHERE assignment_id = :assignment_id");
        $this->bind(":wedding_id", $weddingId);
        $this->bind(":participant_id", $participantId);
        $this->bind(":role_id", $roleId);
        $this->bind(":assignment_id", $assignmentId);
        $this->execute(); // Execute the update
    }

    // Delete a role assignment
    public function deleteRoleAssignment($assignmentId) {
        $this->query("DELETE FROM role_assignments WHERE assignment_id = :assignment_id");
        $this->bind(":assignment_id", $assignmentId);
        $this->execute(); // Execute the delete
    }
}
?>