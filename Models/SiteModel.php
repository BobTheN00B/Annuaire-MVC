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
        // Utilisation des noms de colonnes exacts du fichier SQL
        $sql = 'INSERT INTO Sites (Titre, URL, Description, Id_Categorie, Id_Utilisateur) VALUES (:titre, :url, :description, :id_categorie, :id_utilisateur)';
        $sth = $this->_pdo->prepare($sql);
        return $sth->execute([
            ':titre' => $titre,
            ':url' => $url,
            ':description' => $description,
            ':id_categorie' => $categorieId,
            ':id_utilisateur' => $utilisateurId,
        ]);
    }

    public function listByUser(int $utilisateurId): array
    {
        $sql = 'SELECT s.*, c.Libelle AS categorie 
                FROM Sites s 
                LEFT JOIN Categorie c ON c.Id_Categorie = s.Id_Categorie 
                WHERE s.Id_Utilisateur = :id_utilisateur 
                ORDER BY s.Id_Sites DESC'; 
            
        $sth = $this->_pdo->prepare($sql);
        $sth->execute([':id_utilisateur' => $utilisateurId]);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectByIdForUser(int $id, int $utilisateurId): ?array
    {
        $sql = 'SELECT * FROM Sites WHERE Id_Sites = :id AND Id_Utilisateur = :id_utilisateur LIMIT 1';
        $sth = $this->_pdo->prepare($sql);
        $sth->execute([':id' => $id, ':id_utilisateur' => $utilisateurId]);
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function updateSite(int $id, string $titre, string $url, string $description, int $categorieId, int $utilisateurId): bool
    {
        $sql = 'UPDATE Sites SET Titre = :titre, URL = :url, Description = :description, Id_Categorie = :id_categorie 
                WHERE Id_Sites = :id AND Id_Utilisateur = :id_utilisateur';
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

    public function deleteForUser(int $id, int $utilisateurId): bool
    {
         $sql = 'DELETE FROM Sites WHERE Id_Sites = :id AND Id_Utilisateur = :id_utilisateur';
         $sth = $this->_pdo->prepare($sql);
         return $sth->execute([
            ':id' => $id,
            ':id_utilisateur' => $utilisateurId,
        ]);
    }

    public function search(?int $categorieId, ?string $keyword): array
    {
        $sql = 'SELECT s.*, c.Libelle AS categorie FROM Sites s LEFT JOIN Categorie c ON c.Id_Categorie = s.Id_Categorie WHERE 1 = 1';
        $params = [];

        if ($categorieId !== null) {
            $sql .= ' AND s.Id_Categorie = :id_categorie';
            $params[':id_categorie'] = $categorieId;
        }

        if ($keyword !== null && $keyword !== '') {
            $sql .= ' AND (s.Titre LIKE :kw OR s.Description LIKE :kw OR s.URL LIKE :kw OR c.Libelle LIKE :kw)';
            $params[':kw'] = '%' . $keyword . '%';
        }

        $sql .= ' ORDER BY s.Id_Sites DESC';
        $sth = $this->_pdo->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}