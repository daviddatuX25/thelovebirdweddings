<?php
class Template{
	protected $templateFile; //Location of the template file 
	protected $vars = array(); //Storage of assigned variables by __set & __get
	public $templateName; //Name of the template file 
  	
	// Initializes the tempate object vars & sets the template file location
	public function __construct($templateFile){
		$this->templateFile = $templateFile;
		$this->vars["templateName"] = explode(".", basename($this->templateFile))[0];
	}

	// Get properties (not defined within the class/local scope) from the vars array. 
	public function __get($varKey){
		return $this->vars[$var];
	}
	// Create/sets properties (not defined within the class/local scope) into the vars array. 
	public function __set($varKey, $value){ 
		$this->vars[$varKey] = $value;
	}

	// When the template is outputed/echoed, this function runs
	public function __toString(){
		extract($this->vars); //Extracts the vars array into the local scope
		chdir(dirname($this->templateFile)); //Changes the directory to the template file's directory
		ob_start(); // Starts output buffering
		include basename("$this->templateFile"); // Includes the template file
		return ob_get_clean(); // Returns the output buffer and clears it
	}

}

?>