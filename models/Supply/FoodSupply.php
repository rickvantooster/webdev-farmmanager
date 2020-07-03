<?php 
namespace Models\Supply;
require_once("../../includes.php");
use Models\Supply\AbstractSupply;
class FoodSupply extends AbstractSupply{
    private $type;
    public function __construct($name, $remaining, $type, $id){
        parent::__construct($name, $remaining, $id);
        $this->type = $type;
        
    }
    
}