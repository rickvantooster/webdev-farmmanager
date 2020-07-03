<?php
    namespace Models\Animal;
    require_once("../../includes.php");

    abstract class AbstractAnimal implements IAnimal{
        private $id;
        private $status;
        private $quantity;
        private $birthdate;
        private $name;
        private $legalRegistrationTag;
        private $heldAs;
        private $products = array();

        public function __construct($status, $quantity, $birthdate, $name, $legalRegistrationTag, $heldAs, $products = array(), $id){
            $this->status = $status;
            $this->quantity = $quantity;
            $this->birthdate = $birthdate;
            $this->name = $name;
            $this->legalRegistrationTag = $legalRegistrationTag;
            $this->heldAs = $heldAs;
            $this->products = $products;
            $this->id = $id;
        }

        public function getStatus(){
            return $this->status;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function getBirthday(){
            return $this->birthdate;
        }

        public function getName(){
            return $this->name;
        }

        public function getLegalRegistrationTag(){
            return $this->legalRegistrationTag;
        }

        public function getHeldAs(){
            return $this->heldAs;
        }

        public function getProducts(){
            return $this->products;
        }

        public function getId(){
            return $this->id;
        }

    }