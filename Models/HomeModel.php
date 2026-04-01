<?php
/**
 * Description of AccueilModel
 *
 * @author Kevin
 * @version 1.0.0
 * 
 */
class AccueilModel {
    private $pdo;
    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=annuaire;host=192.168.56.10","etudiant","etudiant");
    }

}
