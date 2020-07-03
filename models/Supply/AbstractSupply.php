<?php 
namespace Models\Supply;
require_once("../../includes.php");
use \Models\Buyable;

abstract class AbstractSupply extends \AbstractBuyable{
    private $id;
    private $remaining;
    private $name;
    

    public function __construct($name, $remaining, $id){
        $this->remaining = $remaining;
        $this->name = $name;
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    
}
