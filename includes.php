<?php

//Load all classes
spl_autoload_register(function ($class){
    require_once $class . ".php";
});

//load all helpers
$helperDir = __DIR__."/Helpers";
$helperIterator = new DirectoryIterator(__DIR__."/Helpers");
foreach($helperIterator as $file){
    if(!$file->isDot()){
        require_once($helperDir . "/".$file->getFilename());
    }
}

//include init file.
require_once("init.php");



