<?php

require_once __DIR__ . '/../Models/UtilisateurModel.php';

class UserController
{
    private UtilisateurModel $model;

    public function __construct()
    {
        $this->model = new UtilisateurModel();
    }

    private function isConnected(): bool
    {
        return isset($_SESSION['user']['id']);
    }

    private function requireGuest(): void
    {
        if ($this->isConnected()) {
            header('Location: index.php?page=utilisateur&action=list');
            exit;
        }
    }

    private function requireAuth(): void
    {
        if (!$this->isConnected()) {
            header('Location: index.php?page=utilisateur&action=login');
            exit;
        }
    }

    public function list(): array
    {
        $this->requireAuth();

        return [
            'titre' => 'Mon compte',
            'description' => 'Vous êtes connecté.',
            'user' => $_SESSION['user'],
        ];
    }

    public function login(): array
    {
        $this->requireGuest(); 
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
            $password = (string) filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
            if ($mail && $password !== '') {
                $user = $this->model->verifyLogin($mail, $password);
                if ($user !== null) {
                    $_SESSION['user'] = ['id' => $user['id'], 'mail' => $user['mail']];
                    header('Location: index.php?page=utilisateur&action=list');
                    exit;
                }
            }

            return ['titre' => 'Connexion', 'description' => 'Identifiants invalides.', 'error' => true];
        }

        return ['titre' => 'Connexion', 'description' => 'Connectez-vous à votre compte.', 'error' => false];
    }

    public function register(): array
    {
        $this->requireGuest();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
            $password = (string) filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

            if ($mail && strlen($password) >= 6 && $this->model->findByMail($mail) === null) {
                $this->model->create($mail, $password);
                header('Location: index.php?page=utilisateur&action=login');
                exit;
            }

            return ['titre' => 'Inscription', 'description' => 'Inscription impossible.', 'error' => true];
        }

        return ['titre' => 'Inscription', 'description' => 'Créez votre compte.', 'error' => false];
    }

    public function logout(): array
    {
        unset($_SESSION['user']);
        header('Location: index.php');
        exit;
    }

}