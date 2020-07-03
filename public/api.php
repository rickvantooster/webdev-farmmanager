<?php

require_once("../includes.php");


define("WEBROOT", str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));


$router = new Core\Router();
//plaats ajax request routes hier.

$url = "/".$_GET["p"];


$router->handleRoute($url);


