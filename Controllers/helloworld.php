<?php
require_once("../Core/Controller.php");
use Core\Request;
use Core\Controller;


class helloworld extends Controller{

    public function hello(Request $request){
       return $this->json(["message"=>"hello world!"]);
    }
}