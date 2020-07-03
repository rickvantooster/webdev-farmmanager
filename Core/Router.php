<?php

//https://stackoverflow.com/questions/30130913/how-to-do-url-matching-regex-for-routing-framework
namespace Core;
require_once("../includes.php");
class Router{

    /**
     * $routes ziet er zo uit:
     * [route] => ["GET" => "class@methode", "POST"=>"class@methode"]
     */

    private $routes = array();

    public function getRoutes(){
        return $this->routes;
    }

    public function get($route, $controller){
        $this->routes[$route]["GET"] = $controller;
    }

    public function post($route, $controller){
        $this->routes[$route]["POST"] = $controller;
    }

    public function put($route, $controller){
        $this->routes[$route]["PUT"] = $controller;
    }

    public function delete($route, $controller){
        $this->routes[$route]["DELETE"] = $controller;
    }

    public function patch($route, $controller){
        $this->routes[$route]["PATCH"] = $controller;
    }

    //handelt een route af.
    public function handleRoute($url){

        $routes = array_keys($this->routes);
        $routes_methods = $this->routes;
        
        $parsedParams = array();
        /**
         * loop over alle routes die bestaan en vind de matchende route.
         */
        foreach($routes as $route){
            $patternAsRegex = $this->buildRegexp($route);
            if(!!$patternAsRegex){
                if($ok = preg_match($patternAsRegex, $url, $matches)){
                    $params = array_intersect_key(
                        $matches,
                        array_flip(array_filter(array_keys($matches), 'is_string'))
                    );
                    /**
                     * transformeert een parameter in de url na een param die door gegeven wordt aan de controller.
                     * bijvoorbeeld wanneer de route /hello/:name is
                     * en de gebruiker doet een request naar /hello/world
                     * dan is parsedParams ["name" => "world"] 
                     */
                    foreach($params as $key => $value){
                        
                        $parsedParams[$key] = $value;

                    }
                    $REQUEST_METHOD = $_SERVER["REQUEST_METHOD"];
                    if(isset($routes_methods[$route][$REQUEST_METHOD])){

                            $controllerMethodPair = explode("@", $routes_methods[$route][$REQUEST_METHOD]);

                            $name = $controllerMethodPair[0];
                            $file = '../Controllers/' . $name . '.php';
                            require($file);
                            $controller = new $name();
                            $REQUEST = new Request($route);
                            $REQUEST->addParams($parsedParams);
                            echo $controller->{$controllerMethodPair[1]}($REQUEST);
                        die();
                    }
                    break;
                }
            }

        }
        $REQUEST = new Request($route);
        if($accept = $REQUEST->header("accept")){
            if($accept === "application/json"){
                echo json_encode(["error"=>"page not found"]);
            }
        }
        
        http_response_code(404);
        echo json_encode(["error"=>"page not found"]);
        die();
    }

    public function parseUrl($url){
        $splitted = explode("/",$url);
        $required = array();

        foreach($splitted as $entry => $part){
            if($part[0] === ':'){
                $required[] = $entry;
            }
        }

        return ["parts"=>$splitted, "required"=>$required];
    }

    private function buildRegexp($pattern){
       
        //returns false wanneer de pattern invalid is.
        if (preg_match('/[^-:\/_{}()a-zA-Z\d]/', $pattern))
            return false; 

        // verandered "(/)" naar "/?"
        $pattern = preg_replace('#\(/\)#', '/?', $pattern);

        // maakt een capture group voor ":parameter"
        $allowedParamChars = '[a-zA-Z0-9\_\-]+';
        $pattern = preg_replace(
            '/:(' . $allowedParamChars . ')/',   # vervang ":parameter"
            '(?<$1>' . $allowedParamChars . ')', # met "(?<parameter>[a-zA-Z0-9\_\-]+)"
            $pattern
        );


        //start en eind matching toevoegen
        $patternAsRegex = "@^" . $pattern . "$@D";

        return $patternAsRegex;
    }

}