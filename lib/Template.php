<?php
class Template{
	protected $templateFile;
	protected $vars = array();
	public $templateName;
 
	public function __construct($templateFile){
		$this->templateFile = $templateFile;
		$this->vars["templateName"] = explode(".", basename($this->templateFile))[0];
	}


	public function __get($varKey){
		return $this->vars[$var];
	}

	public function __set($varKey, $value){
		$this->vars[$varKey] = $value;
	}

	public function __toString(){
		extract($this->vars);
		chdir(dirname($this->templateFile));
		ob_start();
		include basename("$this->templateFile");
		return ob_get_clean();
	}

}

?>