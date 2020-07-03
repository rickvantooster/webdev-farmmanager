<?php
namespace Models\Machine;
require_once("../../includes.php");

class Driveable extends AbstractMachine{
    private $fuelConsumption;
    private $fuelLevel;
    
    public function __construct($name, $status, $damage, $fuelLevel, $fuelConsumption, $id){
        parent::__construct($name,$status,$damage, $id);
        $this->fuelConsumption = $fuelConsumption;
        $this->fuelLevel = $fuelLevel;
    }

    public function getFuelConsumption(){
        return $this->fuelConsumption;
    }

    public function getFuelLevel(){
        return $this->fuelLevel;
    }


    public function setFuelLevel($fuel){
        $this->fuelLevel = $fuel;
    }

}

