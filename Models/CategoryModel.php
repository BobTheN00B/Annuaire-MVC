<?php

declare(strict_types=1);

require_once __DIR__ . '/../core/Model.php';

/**
 * Description of AccueilModel
 *
 * @author Kevin
 * @version 1.0.0
 * 
 */
class CategoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'Categorie';
    }

    public function insert(string $unLlibelle): bool
    {
        $sth = $this->_pdo->prepare('INSERT INTO ' . $this->_table . ' (libelle) VALUES (:libelle)');
        return $sth->execute([':libelle' => $unLlibelle]);
    }

    public function delete(int $unId): bool
    {
        return $this->deleteById($unId);
    }

    public function update(int $unId, string $unLibelle): bool
    {
        $sth = $this->_pdo->prepare('UPDATE ' . $this->_table . ' SET libelle=:libelle WHERE id = :id');
        return $sth->execute([':id' => $unId, ':libelle' => $unLibelle]);
    }

    public function selectById(int $unId): array
    {
        $sth = $this->_pdo->prepare('SELECT * FROM ' . $this->_table . ' WHERE id = :id');
        $sth->execute([':id' => $unId]);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}