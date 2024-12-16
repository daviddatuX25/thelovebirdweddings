<?php
require 'config.php';

spl_autoload_register(function($classname){
require 'lib/' . $classname . '.php';
});

?>