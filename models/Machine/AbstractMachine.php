<?php
namespace Models\Machine;
require_once("../../includes.php");
use Models\Buyable;

abstract class AbstractMachine extends \AbstractBuyable{
    private $id;
    private $name;
    private $status;
    private $damage;

    public function __construct($name, $status, $damage, $id){
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->damage = $damage;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getName(){
        return $this->name;
    }

    public function getDamage(){
        return $this->damage;
    }

    public function setDamage($damage){
        $this->damage = $damage;
    }

    public function getId(){
        return $this->id;
    }

}