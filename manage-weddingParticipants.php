<?php
include_once 'config/init.php';
session_start();

$weddingsDB = new Weddings();
$themes = new Themes();