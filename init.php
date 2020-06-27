<?php

//constant definitions for database credentials.

$config = file_get_contents(__DIR__."/config.json");
$config = json_decode($config, true);

define("DB_USER", $config["database"]["user"]);
define("DB_PASSWORD", $config["database"]["password"]);
define("DB_DATABASE", $config["database"]["database"]);
define("DB_HOST", $config["database"]["host"]);

define("FILES_STORAGE", __DIR__."/files/");

define("JWT_SECRET", file_get_contents(__DIR__."/".$config["jwt"]["secret_file"]));


