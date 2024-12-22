<?php
// This class handles database operations using PDO (PHP Data Objects).
class Database {
    // Database connection details are stored as private properties.
    private $db_host = DB_HOST; // Hostname of the database server
    private $db_name = DB_NAME; // Name of the database
    private $db_username = DB_USER; // Username for database access
    private $db_password = DB_PASS; // Password for database access

    private $databaseHandler; // This will hold the PDO connection
    private $statement; // This will hold the prepared SQL statement
    private $errorMessage; // This will store any error messages

    // The constructor method is called when an object of this class is created.
    public function __construct() {
        // Create a Data Source Name (DSN) for the database connection.
        $dsn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;

        // Set options for the PDO connection.
        $options = array(
            PDO::ATTR_PERSISTENT => TRUE, // Use persistent connections
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Throw exceptions on errors
        );

        // Try to create a new PDO connection.
        try {
            $this->databaseHandler = new PDO($dsn, $this->db_username, $this->db_password, $options);
        } catch(PDOException $error) {
            // If there's an error, store the error message.
            $this->errorMessage = $error->getMessage();
        }
    }

    // Prepares an SQL query for execution.
    protected function query($sqlCode) {
        $this->statement = $this->databaseHandler->prepare($sqlCode);
    }

    // Binds a value to a parameter in the prepared statement.
    protected function bind($parameter, $value, $type = "") {
        // Determine the type of the value if not provided.
        if ($type == NULL) {
            switch (TRUE) {
                case is_int($value):
                    $type = PDO::PARAM_INT; // Integer type
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL; // Boolean type
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL; // Null type
                    break;
                default:
                    $type = PDO::PARAM_STR; // String type
                    break;
            }
        }

        // Bind the value to the parameter in the prepared statement.
        $this->statement->bindValue($parameter, $value, $type);
    }

    // Executes the prepared statement.
    protected function execute() {
        $this->statement->execute();
    }

    // Fetches all results from the executed statement as an array of objects.
    protected function getResults() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Fetches a single result from the executed statement as an object.
    protected function getResult() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // Returns the ID of the last inserted row.
    public function getLastId() {
        return $this->databaseHandler->lastInsertId();
    }

    // Runs a query with parameters, binding them to the prepared statement.
    public function runQuery($sqlCode, $params = []) {
        $this->query($sqlCode); // Prepare the SQL query
        foreach ($params as $param => $value) {
            $this->bind($param, $value); // Bind each parameter
        }
        $this->execute(); // Execute the query
    }
}
?>