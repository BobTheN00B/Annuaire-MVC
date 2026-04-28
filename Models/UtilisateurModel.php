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
    private string $idColumn;
    private string $mailColumn;
    private string $passwordColumn;
    private string $paramsColumn;

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'Utilisateur';
        $columns = $this->detectColumns();
        $this->idColumn = $columns['id'];
        $this->mailColumn = $columns['mail'];
        $this->passwordColumn = $columns['password'];
        $this->paramsColumn = $columns['params'];
        $this->_primaryKey = $this->idColumn;
    }

    private function detectColumns(): array
    {
        $sth = $this->_pdo->query('SHOW COLUMNS FROM ' . $this->_table);
        $fields = array_map(static function (array $row): string {
            return strtolower((string) $row['Field']);
        }, $sth->fetchAll(PDO::FETCH_ASSOC));

        return [
            'id' => in_array('id', $fields, true) ? 'id' : 'Id_Utilisateur',
            'mail' => in_array('mail', $fields, true) ? 'mail' : 'Mail',
            'password' => in_array('mdp', $fields, true) ? 'mdp' : 'MDP',
            'params' => in_array('params', $fields, true) ? 'params' : 'Params',
        ];
    }

     public function findByMail(string $mail): ?array
    {
        $sql = sprintf(
            'SELECT %s AS id, %s AS mail, %s AS mdp FROM %s WHERE %s = :mail LIMIT 1',
            $this->idColumn,
            $this->mailColumn,
            $this->passwordColumn,
            $this->_table,
            $this->mailColumn
        );
        $sth = $this->_pdo->prepare($sql);
        $sth->execute([':mail' => $mail]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }

    public function create(string $mail, string $plainPassword): bool
    {
        $passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);
        $sql = sprintf(
            'INSERT INTO %s (%s, %s, %s) VALUES (:mail, :mdp, :params)',
            $this->_table,
            $this->mailColumn,
            $this->passwordColumn,
            $this->paramsColumn
        );
        $sth = $this->_pdo->prepare($sql);
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

    public function updateMail(int $id, string $mail): bool
    {
        $sql = sprintf('UPDATE %s SET %s = :mail WHERE %s = :id', $this->_table, $this->mailColumn, $this->idColumn);
        $sth = $this->_pdo->prepare($sql);
        return $sth->execute([
            ':id' => $id,
            ':mail' => $mail,
        ]);
    }

    public function updatePassword(int $id, string $plainPassword): bool
    {
        $passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);
        $sql = sprintf('UPDATE %s SET %s = :mdp WHERE %s = :id', $this->_table, $this->passwordColumn, $this->idColumn);
        $sth = $this->_pdo->prepare($sql);
        return $sth->execute([
            ':id' => $id,
            ':mdp' => $passwordHash,
        ]);
    }
}