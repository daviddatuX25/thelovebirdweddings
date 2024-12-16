<?php
class Roles extends Database {
    // Read all roles
    public function getAllRoles() {
        $this->query("SELECT * FROM roles");
        return $this->getResults(); // Return all roles
    }

    // Get role ID by role name
    public function getRoleIdByName($roleName) {
        $this->query("SELECT role_id FROM roles WHERE role_name = :role_name");
        $this->bind(":role_name", $roleName);
        return $this->getResult()->role_id; // Return the role ID for the specified role name
    }

    // Create a new role
    public function createRole($roleData) {
        $this->query("INSERT INTO roles (role_name) VALUES (:role_name)");
        $this->bind(":role_name", $roleData['role_name']);
        $this->execute(); // Execute the insert
        return $this->getLastId(); // Return the ID of the newly created role
    }

    // Update role information
    public function updateRole($roleId, $roleData) {
        $this->query("UPDATE roles SET role_name = :role_name WHERE role_id = :role_id");
        $this->bind(":role_name", $roleData['role_name']);
        $this->bind(":role_id", $roleId);
        $this->execute(); // Execute the update
    }

    // Delete a role
    public function deleteRole($roleId) {
        $this->query("DELETE FROM roles WHERE role_id = :role_id");
        $this->bind(":role_id", $roleId);
        $this->execute(); // Execute the delete
    }
}
?>