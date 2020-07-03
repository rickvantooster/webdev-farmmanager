<?php
namespace Models\Animal;
require_once("../../includes.php");

class Cow extends AbstractAnimal{

    public function __construct($status, $date, $name, $legalRegistrationTag, $id){
        parent::__construct($status, 1, $date, $name, $legalRegistrationTag, null, ["milk", "cowMeat"], $id);
    }

}