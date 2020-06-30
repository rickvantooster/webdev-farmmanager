<?php
namespace Core;
require_once("../init.php");

class Controller{

    public $params;
    private $headers;


    public function json($body, $status = 200, $additionalHeaders = array()){
        http_response_code($status);
        header("Content-Type: application/json");
        foreach($additionalHeaders as $header => $value){
            header("$header: $value");
        }

        return json_encode($body);
    }


    public function download($file){
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . urlencode($file));   
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Description: File Transfer");            
        header("Content-Length: " . filesize($file));
        $file_content = file_get_contents(FILES_STORAGE.  $file);
        return $file_content;

    }

    public function view($view, $params = [], $status = 200, $additionalHeaders = array()){
        http_response_code($status);
        foreach($additionalHeaders as $header => $value){
            header("$header: $value");
        }
        foreach($params as &$param){
            if(is_object($param)){
                $param = (array) $param;
            }
        }

        extract($params);

        require_once("../views/".$view);

        return "";
    }

    public function redirect($to){
        header("Location: ". $to);
        return "";
    }
 

}