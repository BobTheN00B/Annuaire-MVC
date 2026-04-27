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
class UtilisateurModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'Utilisateur';
    }

    public function findByMail(string $mail): ?array
    {
        $sth = $this->_pdo->prepare('SELECT * FROM ' . $this->_table . ' WHERE mail = :mail LIMIT 1');
        $sth->execute([':mail' => $mail]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }

    public function create(string $mail, string $plainPassword): bool
    {
        $passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);
        $sth = $this->_pdo->prepare('INSERT INTO ' . $this->_table . ' (mail, mdp, params) VALUES (:mail, :mdp, :params)');
        return $sth->execute([
            ':mail' => $mail,
            ':mdp' => $passwordHash,
            ':params' => json_encode(['role' => 'user'], JSON_UNESCAPED_UNICODE),
        ]);
    }

    public function verifyLogin(string $mail, string $plainPassword): ?array
    {
        $user = $this->findByMail($mail);
        if ($user === null) {
            return null;
        }

        $hash = (string) ($user['mdp'] ?? '');
        if ($hash !== '' && password_verify($plainPassword, $hash)) {
            return $user;
        }

        return null;
    }
}