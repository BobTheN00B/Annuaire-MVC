<?php

declare(strict_types=1);
require_once __DIR__ . '/Db.php';

/**
 * Description of Model
 *
 * @author Kevin
 */
class Model
{
    protected PDO $_pdo;
    protected string $_table;

    /**
     * Instancie l'attribut PDO depuis mon Singleton
     * 
     */
    public function __construct() {
        $this->_pdo = Db::getInstance()->getPdo();
    }
    /**
     * Retourne le jeu d'enregistrement des catégories
     * 
     * @return PDOStatement
     */
    public function list() {
        $sql = "select * from " . $this->_table;
        return $this->_pdo->query($sql);
    }

    public function deleteById(int $id): bool
    {
        $sth = $this->_pdo->prepare('DELETE FROM ' . $this->_table . ' WHERE id = :id');
        return $sth->execute([':id' => $id]);
    }
}
