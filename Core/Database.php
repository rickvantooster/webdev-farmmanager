<?php
    namespace Core;
    require_once("../init.php");

    class Database{
        private static $instance = null;
        private $conn = null;
        

        private function __construct(){
            $dsn = "mysql:host=". DB_HOST . ";dbname=". DB_DATABASE;
        
            try {
                
                $this->conn = new \PDO($dsn, DB_USER, DB_PASSWORD);
                $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            }catch(\PDOException $e){
                http_response_code(500);
                //implement log file builder. And put exception and trace in it.
                echo "Error occured while trying to setup a connection to the database";
                echo $e;
            }
        }

        public static function getInstance(){
            if (self::$instance == null){
                self::$instance = new Database();
            }
        
            return self::$instance;
        }

        public function query($sql, $params = array()){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
        }
    
        public function selectQuery($sql, $params = array()){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
    
        public function rowSelectQuery($sql, $params = array()){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll()[0];
        }
    
        public function getLastInsert(){
            return $this->conn->lastInsertId();
        }
    
        public function columnQuery($sql, $params = array()){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchColumn(0);
        }
    
        public function startTransaction(){
            $this->conn->beginTransaction();
        }
    
        public function commitTransaction(){
            $this->conn->commit();
        }
    
        public function rollbackTransaction(){
            $this->conn->rollBack();
        }


        public function generateWildcards($symbol, $amount=0, $separator=","){
            $result = array();
            if($amount > 0){
                for($x=0; $x<$amount; $x++){
                    $result[] = $symbol;
                }
            }
        
            return implode($separator, $result);
        }

    }
