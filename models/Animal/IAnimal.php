<?php 
    namespace Models\Animal;
    require_once("../../includes.php");
    
    use Models\Buyable;

    interface IAnimal extends \AbstractBuyable{
        public function slaughter();
        public function feed();
        public function collectProduct();
    }