<?php

require_once("../includes.php");


define("WEBROOT", str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));


$router = new Core\Router();



$router->get("/", "Auth@showAuthPage");
$router->post("/register", "Auth@registerUser");
$router->post("/login", "Auth@loginUser");
$router->get("/manager", "Manager@show");
$router->get("/market", "Market@show");
$router->get("/logout", "Auth@logout");

$url = "/".$_GET["p"];



$router->handleRoute($url);


