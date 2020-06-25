<?php
namespace Core;
class Request{
    public $url;
    public $route;
    public $method;
    public $params;
    private $headers;

    public function __construct($route){
        $this->url = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->$route = $route;
        $data = $_REQUEST;
        unset($data["p"]);

        $data = array_merge($data, $_SESSION);
        
        $this->headers = getallheaders();

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);

        if($input !== null){
            $data = array_merge($data, $input);
        }
        

        $this->params = $data;

    }

    public function addParams($params){
        foreach($params as $key => $value){
            $this->params[$key] = $value;
        }
    }

    function header($key){
        if(!isset($this->headers[$key])){
            return null;
        }

        return $this->headers[$key];
    }
}