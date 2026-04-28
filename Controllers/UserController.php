<?php

require_once __DIR__ . '/../Models/UtilisateurModel.php';
require_once __DIR__ . '/../Models/SiteModel.php';

class UserController
{
    private UtilisateurModel $model;
    private SiteModel $siteModel;

    public function __construct()
    {
        $this->model = new UtilisateurModel();
        $this->siteModel = new SiteModel();
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

    private function setFlash(string $type, string $message): void
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message,
        ];
    }

    private function consumeFlash(): ?array
    {
        if (!isset($_SESSION['flash'])) {
            return null;
        }

        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    public function list(): array
    {
        $this->requireAuth();

        return [
            'titre' => 'Mon compte',
            'description' => 'Gérez votre compte utilisateur.',
            'user' => $_SESSION['user'],
            'flash' => $this->consumeFlash(),
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
                $this->setFlash('success', 'Compte créé avec succès. Vous pouvez maintenant vous connecter.');
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

    public function updateMail(): array
    {
        $this->requireAuth();
        $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $userId = (int) $_SESSION['user']['id'];

        if (!$mail) {
            $this->setFlash('danger', 'Adresse email invalide.');
            header('Location: index.php?page=utilisateur&action=list');
            exit;
        }

        $existingUser = $this->model->findByMail($mail);
        if ($existingUser !== null && (int) $existingUser['id'] !== $userId) {
            $this->setFlash('danger', 'Cette adresse email est déjà utilisée.');
            header('Location: index.php?page=utilisateur&action=list');
            exit;
        }

        $this->model->updateMail($userId, $mail);
        $_SESSION['user']['mail'] = $mail;
        $this->setFlash('success', 'Adresse email mise à jour.');
        header('Location: index.php?page=utilisateur&action=list');
        exit;
    }

    public function updatePassword(): array
    {
        $this->requireAuth();
        $password = (string) filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
        $passwordConfirm = (string) filter_input(INPUT_POST, 'password_confirm', FILTER_UNSAFE_RAW);

        if (strlen($password) < 6) {
            $this->setFlash('danger', 'Le mot de passe doit contenir au moins 6 caractères.');
            header('Location: index.php?page=utilisateur&action=list');
            exit;
        }

        if ($password !== $passwordConfirm) {
            $this->setFlash('danger', 'La confirmation du mot de passe ne correspond pas.');
            header('Location: index.php?page=utilisateur&action=list');
            exit;
        }

        $userId = (int) $_SESSION['user']['id'];
        $this->model->updatePassword($userId, $password);
        $this->setFlash('success', 'Mot de passe mis à jour.');
        header('Location: index.php?page=utilisateur&action=list');
        exit;
    }

    public function deleteAccount(): array
    {
        $this->requireAuth();
        $userId = (int) $_SESSION['user']['id'];
        $this->siteModel->deleteAllForUser($userId);
        $this->model->delete($userId);
        unset($_SESSION['user']);
        $this->setFlash('success', 'Votre compte a été supprimé.');
        header('Location: index.php');
        exit;
    }
}