<?php
namespace Core;
class Model{

    public function __toString(){
        return json_encode(get_object_vars($this));
    }
}