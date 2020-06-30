<?php
    namespace Models\Buyable;

    interface IBuyable{
        public function buy();
        public function getPrice();
        public function sell();
    }