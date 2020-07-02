<?php 
namespace Models\Supply;
require_once("../../includes.php");
use \Models\Buyable;

abstract class AbstractSupply extends \AbstractBuyable{
    private $remaining;
    private $name;
    

    public function __construct($name, $remaining){
        $this->remaining = $remaining;
        $this->name = $name;
    }

    
}
