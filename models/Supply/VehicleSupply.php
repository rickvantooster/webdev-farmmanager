<?php 
namespace Models\Supply;
require_once("../../includes.php");

class VehicleSupply extends AbstractSupply{
    private $type;
    public function __construct($name, $remaining, $type, $id){
        parent::__construct($name, $remaining, $id);
        //obtain type from database.
    }
    
}