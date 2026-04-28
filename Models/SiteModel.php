<?php

require_once __DIR__ . '/../core/Model.php';

class SiteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'Sites';
    }

    public function create(string $titre, string $url, string $description, int $categorieId, int $utilisateurId): bool
    {
        $sql = 'INSERT INTO Sites (titre, url, description, id_categorie, id_utilisateur) VALUES (:titre, :url, :description, :id_categorie, :id_utilisateur)';
        $sth = $this->_pdo->prepare($sql);
        return $sth->execute([
            ':titre' => $titre,
            ':url' => $url,
            ':description' => $description,
            ':id_categorie' => $categorieId,
            ':id_utilisateur' => $utilisateurId,
        ]);
    }

    public function updateSite(int $id, string $titre, string $url, string $description, int $categorieId, int $utilisateurId): bool
    {
        $sql = 'UPDATE Sites SET titre = :titre, url = :url, description = :description, id_categorie = :id_categorie WHERE id = :id AND id_utilisateur = :id_utilisateur';
        $sth = $this->_pdo->prepare($sql);
        return $sth->execute([
            ':id' => $id,
            ':titre' => $titre,
            ':url' => $url,
            ':description' => $description,
            ':id_categorie' => $categorieId,
            ':id_utilisateur' => $utilisateurId,
        ]);
    }

    public function listByUser(int $utilisateurId): array
    {
        $sql = 'SELECT s.*, c.Libelle AS categorie FROM Sites s LEFT JOIN Categorie c ON c.id = s.id_categorie WHERE s.id_utilisateur = :id_utilisateur ORDER BY s.id DESC';
        $sth = $this->_pdo->prepare($sql);
        $sth->execute([':id_utilisateur' => $utilisateurId]);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectByIdForUser(int $id, int $utilisateurId): ?array
    {
        $sql = 'SELECT * FROM Sites WHERE id = :id AND id_utilisateur = :id_utilisateur LIMIT 1';
        $sth = $this->_pdo->prepare($sql);
        $sth->execute([':id' => $id, ':id_utilisateur' => $utilisateurId]);
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function deleteForUser(int $id, int $utilisateurId): bool
    {
         return $this->deleteBy('id = :id AND id_utilisateur = :id_utilisateur', [
            ':id' => $id,
            ':id_utilisateur' => $utilisateurId,
        ]);
    }

    public function search(?int $categorieId, ?string $keyword): array
    {
        $sql = 'SELECT s.*, c.Libelle AS categorie FROM Sites s LEFT JOIN Categorie c ON c.id = s.id_categorie WHERE 1 = 1';
        $params = [];

        if ($categorieId !== null) {
            $sql .= ' AND s.id_categorie = :id_categorie';
            $params[':id_categorie'] = $categorieId;
        }

        if ($keyword !== null && $keyword !== '') {
            $sql .= ' AND (s.titre LIKE :kw OR s.description LIKE :kw OR s.url LIKE :kw)';
            $params[':kw'] = '%' . $keyword . '%';
        }

        $sql .= ' ORDER BY s.id DESC';
        $sth = $this->_pdo->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}