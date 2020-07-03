<?php
namespace Models;

use Models\Supply\CropSupply;
use Models\Supply\FoodSupply;
use Models\Animal\Chicken;
use Models\Animal\Cow;
use Models\Machine\Driveable;
use Models\Machine\Trailer;
use Models\Supply\VehicleSupply;

require_once("../includes.php");

class Farm{
    private $animals = [];
    private $machines = [];
    private $supplies = [];
    private $money;
    private $user;
    private $name = null;

    public function __construct($userId){
        $dbc = \Core\Database::getInstance();
        $farm = $dbc->rowSelectQuery("SELECT * FROM farm WHERE user_id = ?", [$userId]);
        if(!$farm){
            return;
        }
        $animals = $dbc->selectQuery("SELECT ls.id, ls.quantity, ls.birthdate, ls.status,
            ls.name, ls.legalRegistrationTag, lst.name AS type, lst.heldAs, fs.age 
            FROM farmlivestock AS fs LEFT JOIN livestock AS ls ON ls.id = fs.livestock_id 
            LEFT JOIN livestocktypes AS lst ON lst.id = ls.livestockTypes_id
            WHERE fs.farm_id = ?", [$farm["id"]]);

        foreach($animals as $animal){
            if($animal["type"] === "chicken"){
                $this->animals[] = new Chicken($animal["status"], $animal["quantity"], $animal["id"]);
            }elseif($animal["type"] === "cow"){
                $this->animals[] = new Cow($animal["status"], $animal["birthdate"], $animal["name"], $animal["legalRegistrationTag"], $animal["id"]);
            }
        }

        $machines = $dbc->selectQuery("SELECT m.id, m.name, m.type, fm.status, fm.damage, m.fuelconsumption, fm.fuellevel 
            FROM farmmachine AS fm LEFT JOIN machines AS m ON m.id = fm.machine_id WHERE fm.farm_id = ?", [$farm["id"]]);
        

       
        foreach($machines as $machine){
            if(in_array($machine["type"], ["harvester", "tractor", "combiner"])){
                $this->machines[] = new Driveable($machine["name"], $machine["status"], $machine["damage"], $machine["fuellevel"], $machine["fuelconsumption"], $machine["id"]);
            }else{
                $this->machines[] = new Trailer($machine["name"], $machine["status"], $machine["damage"], $machine["id"]);
            }
        }

        $supplies = $dbc->selectQuery("SELECT fs.status, fs.remaining, s.name, s.type, s.amount 
            FROM farmsupplies AS fs LEFT JOIN supplies AS s ON s.id = fs.supplies_id where fs.farm_id = ?", [$farm["id"]]);

        foreach($supplies as $supply){
            if(in_array($supply["type"], ["corn", "grain", "soja"])){
                $this->supplies[] = new FoodSupply($supply["name"], $supply["remaining"], $supply["type"], $supply["supplies_id"]);
            }elseif(in_array($supply["type"], ["fertilizer", "gassSeeds"])) {
                $this->supplies[] = new CropSupply($supply["name"], $supply["remaining"], $supply["type"],$supply["supplies_id"]);
            }else{
                $this->supplies[] = new VehicleSupply($supply["name"], $supply["remaining"], $supply["type"], $supply["supplies_id"]);
            }
        }

        $this->money = $farm["money"];
        $this->user = new User($farm["user_id"]);
        $this->name = $farm["name"];

    }


    


}
