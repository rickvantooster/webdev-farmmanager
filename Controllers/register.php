<?php

use Core\Controller;

require_once '../includes.php';


class Register extends Controller{

    public function showPage(Core\Request $req){
        //methode uit de Core\Controller class om een template in te laden.
        return $this->view("login.php");
    }

    public function registerUser(Core\Request $req){
        /*
            de class Core\Request heeft alle request parameters en body opgevangen.
        */
        if(!isset($req->params["submitReg"])){
            return $this->json(["error"=>"true", "message"=>"no data send..."], 403);
        }


        $username= htmlspecialchars($req->params['username']);
        $pwd=$req->params['pwd'];
        $pwdcheck=$req->params['pwdcheck'];
        $name=htmlspecialchars($req->params['name']);
        $address=htmlspecialchars($req->params['address']);
        $city=htmlspecialchars($req->params['city']);
        $email=$req->params['email'];
        //shorthand manier om te controlleren of alles bestaat
        if(!isset($username,$pwd,$pwdcheck,$name,$address,$city,$email)){
            return $this->json(["error"=>"true", "message"=>"all fields are required"], 401);
        }


        //controle op valide email address
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $this->json(["error"=>"true", "message"=>"invalid email"], 401);
        }

        //ophalen van een database instance.
        $conn = Core\Database::getInstance();

        //controlleren of er een al een account is met de gegeven username.
        $found = $conn->columnQuery("SELECT COUNT(id) FROM user WHERE username = ?", [$username]);
        if($found !== 0){
            return $this->json(["error"=>"true", "message"=>"username already is in use"], 409);
        }

        //controleren of email adres al word gebruikt.

        $found = $conn->columnQuery("SELECT COUNT(id) FROM user WHERE email = ?", [$email]);
        if($found !== 0){
            return $this->json(["error"=>"true", "message"=>"email already is in use"], 409);
        }

        //wachtwoord match controlleren

        if($pwd !== $pwdcheck){
            return $this->json(["error"=>"true", "message"=>"given passwords are not the same"], 401);
        }
        //wachtwoord hashen met bcrypt
        $passwordHashed = password_hash($pwd, PASSWORD_BCRYPT);
        $conn->query("INSERT INTO user (email, username, password, name, address, city) VALUES (?,?,?,?,?,?)", 
            [$email, $username, $passwordHashed, $name, $address, $city]); //insert de gebruiker in de database.

        return $this->json(["account created"=>true]);

    }

}