<?php
namespace Models\Animal;
require_once("../../includes.php");

class Chicken extends AbstractAnimal{

    public function __construct($status, $quantity, $id){
        parent::__construct($status, $quantity, null, null, null, "group", ["chickenMeat", "eggs"], $id);
    }

}