<?php 
    namespace Models;
    require_once("../includes.php");
    use Core;
use Exception;

class User extends Core\Model{
        public $id;
        public $name;
        public $username;
        public $email;
        public $address;
        public $city;

        public function __construct($id){
            $dbh = Core\Database::getInstance();
            $user = $dbh->rowSelectQuery("SELECT id, email, username, name, address, city FROM user WHERE id = ?", [$id]);
            if(!$user){
                throw new Exception("failed finding user");
            }
            $this->id = $user["id"];
            $this->name = $user["name"];
            $this->username = $user["username"];
            $this->email = $user["email"];
            $this->address = $user["address"];
            $this->city = $user["city"];

        }

    }