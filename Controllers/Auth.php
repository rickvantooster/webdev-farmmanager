<?php

use Core\Controller;
use Core\JsonWebToken;
use Core\Request;

require_once '../includes.php';


class Auth extends Controller{

    public function showAuthPage(Core\Request $req){
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


        $username = htmlspecialchars($req->params['username']);
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
        $found = intval($found);
        if($found){
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

    public function loginUser(Request $req){
        $username = htmlspecialchars($req->params['username']);
        $password = $req->params['pwd'];

        if(!isset($username, $password)){
            return $this->json(["error"=>"true", "message"=>"All fields are required"], 401);
        }

        $conn = Core\Database::getInstance();

        $user = $conn->rowSelectQuery("SELECT id, username, password, email FROM user WHERE username = ?", [$username]);
        if(!$user){
            return $this->json(["error"=>"true", "message"=>"Username or password is incorrect"], 404);
        }

        if(!password_verify($password, $user["password"])){
            return $this->json(["error"=>"true", "message"=>"Username or password is incorrect"], 404);
        }        

        $_SESSION["user"] = $user["id"];
        
        $response = ["success"=>true];

        return $this->json($response);

    }

    public function logout(Core\Request $req){
        unset($_SESSION);

        return $this->redirect(WEBROOT."public/");
    }

}