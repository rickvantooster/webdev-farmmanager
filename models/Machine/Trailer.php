<?php
namespace Models\Machine;

require_once("../../includes.php");

class Trailer extends AbstractMachine{
    
    public function __construct($name, $status, $damage, $id){
        parent::__construct($name,$status,$damage, $id);
    }

}

