<?php

/**
 * Description of Db
 * Db est un singleton permettant d'acceder à notre SGBDR
 * 
 * @author Kevin
 */
class Db {
    private static $_instance = null;
    private $_pdo;
    
    /**
     * J'instancie l'attribut pdo de ma classe 
     * @example Db::getInstance()->getPdo();
     */
    private function __construct(){  
         $this->_pdo = new PDO("mysql:dbname=annuaire;host=192.168.56.10", "etudiant", "etudiant");
    }
    /**
     * 
     * @return Db
     */
    public static function getInstance(){
       if(is_null(Db::$_instance)){
           Db::$_instance = new Db();
       }   
       return Db::$_instance;
    }

    /**
     * @return PDO
     */
    public function getPdo(){
        return $this->_pdo;
    }
     
    
}