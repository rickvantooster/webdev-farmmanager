<?php

use Models\Buyable\IBuyable;

require_once("../../includes.php");

    abstract class AbstractBuyable implements IBuyable{
        private $price;

        public function buy($amount){

        }

        public function getPrice(){
            return $this->price;
        }

        abstract public function sell();

    }