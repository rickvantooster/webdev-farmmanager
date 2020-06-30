<?php
namespace Models\Animal;
require_once("../../includes.php");

class Chicken extends AbstractAnimal{

    public function __construct($status, $date, $name, $legalRegistrationTag){
        parent::__construct($status, 1, $date, $name, $legalRegistrationTag, null, ["milk", "cowMeat"]);
    }

}