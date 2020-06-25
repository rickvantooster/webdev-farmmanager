<?php

//https://stackoverflow.com/questions/30130913/how-to-do-url-matching-regex-for-routing-framework
namespace Core;
require_once("Request.php");
class Router{

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

    public function handleRoute($url){
        global $twig;

        $routes = array_keys($this->routes);
        $routes_methods = $this->routes;
        
        $parsedParams = array();
        foreach($routes as $route){
            $patternAsRegex = $this->buildRegexp($route);
            if(!!$patternAsRegex){
                if($ok = preg_match($patternAsRegex, $url, $matches)){
                    $params = array_intersect_key(
                        $matches,
                        array_flip(array_filter(array_keys($matches), 'is_string'))
                    );
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
        // $pattern = preg_quote($pattern);
        //return false when pattern is invalid.
        if (preg_match('/[^-:\/_{}()a-zA-Z\d]/', $pattern))
            return false; 

        // Turn "(/)" into "/?"
        $pattern = preg_replace('#\(/\)#', '/?', $pattern);

        // Create capture group for ":parameter"
        $allowedParamChars = '[a-zA-Z0-9\_\-]+';
        $pattern = preg_replace(
            '/:(' . $allowedParamChars . ')/',   # Replace ":parameter"
            '(?<$1>' . $allowedParamChars . ')', # with "(?<parameter>[a-zA-Z0-9\_\-]+)"
            $pattern
        );

        // Create capture group for '{parameter}'
        $pattern = preg_replace(
            '/{('. $allowedParamChars .')}/',    # Replace "{parameter}"
            '(?<$1>' . $allowedParamChars . ')', # with "(?<parameter>[a-zA-Z0-9\_\-]+)"
            $pattern
        );

        // Add start and end matching
        $patternAsRegex = "@^" . $pattern . "$@D";

        return $patternAsRegex;
    }

}