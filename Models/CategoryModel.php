<?php

require_once __DIR__ . '/../core/Model.php';

/**
 * Description of AccueilModel
 *
 * @author Kevin
 * @version 1.0.0
 * 
 */
class CategoryModel extends Model {

    private string $idColumn;
    private string $labelColumn;

    public function __construct() {
        parent::__construct();
        $this->_table = "Categorie";
        $columns = $this->detectColumns();
        $this->idColumn = $columns['id'];
        $this->labelColumn = $columns['label'];
        $this->_primaryKey = $this->idColumn;
    }

    private function detectColumns(): array
    {
        $sth = $this->_pdo->query('SHOW COLUMNS FROM ' . $this->_table);
        $fields = array_map(static function (array $row): string {
            return strtolower((string) $row['Field']);
        }, $sth->fetchAll(PDO::FETCH_ASSOC));

        return [
            'id' => in_array('id', $fields, true) ? 'id' : 'Id_Categorie',
            'label' => in_array('libelle', $fields, true) ? 'libelle' : 'Libelle',
        ];
    }

    public function listForUi(): array
    {
        $sql = sprintf(
            'SELECT %s AS id, %s AS libelle FROM %s ORDER BY %s ASC',
            $this->idColumn,
            $this->labelColumn,
            $this->_table,
            $this->labelColumn
        );

        $sth = $this->_pdo->query($sql);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
      avant de factoriser mon code avec l'héritage
      public function list(){
      $sql = "select * from ".$this->table;
      return $this->pdo->query($sql);
      } */

    public function insert(string $unLlibelle) {
        $sth = $this->_pdo->prepare("insert into " . $this->_table .
                " (" . $this->labelColumn . ") values(:libelle)");
        $sth->bindParam(':libelle', $unLlibelle, PDO::PARAM_STR);
        return $sth->execute();
    }

    /**
     * Mise a jour de la catégorie
     * @param int $unId
     * @param string $unLibelle
     * @return int
     */
    public function update(int $unId, string $unLibelle) {
        $sth = $this->_pdo->prepare("update " . $this->_table .
                " SET " . $this->labelColumn . " = :libelle where " . $this->idColumn . " = :id");
        $sth->bindParam(':id', $unId, PDO::PARAM_INT);
        $sth->bindParam(':libelle', $unLibelle, PDO::PARAM_STR);
    }
    public function selectById(int $unId) {
        $sth = $this->_pdo->prepare(sprintf(
            'SELECT %s AS id, %s AS libelle FROM %s WHERE %s = :id LIMIT 1',
            $this->idColumn,
            $this->labelColumn,
            $this->_table,
            $this->idColumn
        ));
        $sth->bindParam(':id', $unId, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}