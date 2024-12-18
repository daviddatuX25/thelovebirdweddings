<?php
class Database{
	private $db_host = DB_HOST;
	private $db_name = DB_NAME;
	private $db_username = DB_USER;
	private $db_password = DB_PASS;

	private $databaseHandler;
	private $statement;
	private $errorMessage;

	public function __construct(){
		$dsn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;

		$options = array(
			PDO::ATTR_PERSISTENT => TRUE,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try {
			$this->databaseHandler = new PDO($dsn,$this->db_username,$this->db_password, $options);
		} catch(PDOException $error) {
			$this->errorMessage = $error->getMessage();
		}
	}

	protected function query($sqlCode){
			$this->statement = $this->databaseHandler->prepare($sqlCode);
		}

	protected function bind($parameter, $value, $type = ""){
		if ($type == NULL){
			switch (TRUE) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->statement->bindValue($parameter, $value, $type);
	}

	protected function execute(){
		$this->statement->execute();
	}

	protected function getResults(){
		$this->execute();
		return $this->statement->fetchAll(PDO::FETCH_OBJ);
	}

	protected function getResult(){
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_OBJ);
	}

	public function getLastId() {
        return $this->databaseHandler->lastInsertId();
    }

	public function runQuery($sqlCode, $params = []) {
        $this->query($sqlCode);
        foreach ($params as $param => $value) {
            $this->bind($param, $value);
        }
        $this->execute();
	}
}
?>