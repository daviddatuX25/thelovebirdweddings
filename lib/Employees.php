<?php
class Employees extends Database {
    // Create a new employee
    public function createEmployee($employeeData) {
        $this->query("INSERT INTO employees (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
        $this->bind(":first_name", $employeeData['first_name']);
        $this->bind(":last_name", $employeeData['last_name']);
        $this->bind(":email", $employeeData['email']);
        $this->execute(); // Execute the insert
        return $this->getLastId(); // Return the ID of the newly created employee
    }

    // Read employee information by ID
    public function getEmployeeById($employeeId) {
        $this->query("SELECT * FROM employees WHERE employee_id = :employee_id");
        $this->bind(":employee_id", $employeeId);
        return $this->getResult(); // Return the employee details
    }

    // Update employee information
    public function updateEmployee($employeeId, $employeeData) {
        $this->query("UPDATE employees SET first_name = :first_name, last_name = :last_name, email = :email WHERE employee_id = :employee_id");
        $this->bind(":first_name", $employeeData['first_name']);
        $this->bind(":last_name", $employeeData['last_name']);
        $this->bind(":email", $employeeData['email']);
        $this->bind(":employee_id", $employeeId);
        $this->execute(); // Execute the update
    }

    // Delete an employee
    public function deleteEmployee($employeeId) {
        $this->query("DELETE FROM employees WHERE employee_id = :employee_id");
        $this->bind(":employee_id", $employeeId);
        $this->execute(); // Execute the delete
    }

    // Get Employees By ID
    public function getAllEmployees() {
        $this->query("SELECT * FROM employees");
        return $this->getResults();
    }
}
?>