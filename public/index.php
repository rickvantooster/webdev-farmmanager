<?php

require_once("../includes.php");


define("WEBROOT", str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));


$router = new Core\Router();



$router->get("/register", "Register@showPage");
$router->post("/register", "Register@registerUser");

$url = "/".$_GET["p"];

// var_dump($router->getRoutes());
// var_dump($url);

$router->handleRoute($url);


