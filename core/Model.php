<?php

require_once __DIR__ . '/Db.php';

/**
 * Description of Model
 *
 * @author Kevin
 */
class Model {

    protected $_pdo;
    protected $_table;
    protected string $_primaryKey = 'id';

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

    /**
     * Suppression générique par identifiant.
     *
     * @param int $unId
     * @return bool
     */
    public function delete(int $unId): bool {
        return $this->deleteBy($this->_primaryKey . ' = :id', [
            ':id' => $unId,
        ]);
    }

    /**
     * Suppression générique avec conditions.
     *
     * @param string $whereClause
     * @param array $params
     * @return bool
     */
    protected function deleteBy(string $whereClause, array $params): bool {
        $sql = 'delete from ' . $this->_table . ' where ' . $whereClause;
        $sth = $this->_pdo->prepare($sql);
        return $sth->execute($params);
    }

}
