<?php
use Models\User;
require_once("../includes.php");

class Market extends Core\Controller{

    public function show(Core\Request $req){
        if(!isset($_SESSION["user"])){
            // var_dump(WEBROOT);
            $this->redirect(WEBROOT."public/");
        }

        $user = new User($_SESSION["user"]);

        return $this->view("transfermarket.php", ["user"=>$user, "year"=>date("Y")]);
    }

}