<?php 
require_once("../../includes.php");

class FoodSupply extends AbstractSupply{
    private $type;
    public function __construct($name, $remaining, $type){
        parent::__construct($name, $remaining);
        //obtain type from database.
    }
    
}