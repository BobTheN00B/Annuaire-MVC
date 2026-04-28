<?php

require_once __DIR__ . '/../Models/SiteModel.php';
require_once __DIR__ . '/../Models/CategoryModel.php';

class SiteController
{
    private SiteModel $siteModel;
    private CategoryModel $categoryModel;

    public function __construct()
    {
        $this->siteModel = new SiteModel();
        $this->categoryModel = new CategoryModel();
    }

    private function userId(): int
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?page=utilisateur&action=login');
            exit;
        }

        return (int) $_SESSION['user']['id'];
    }

    public function list(): array
    {
        $userId = $this->userId();

        return [
            'titre' => 'Mes sites',
            'description' => 'Gérez vos sites web.',
            'sites' => $this->siteModel->listByUser($userId),
        ];
    }

    public function add(): array
    {
        $this->userId();
        return [
            'titre' => 'Ajouter un site',
            'description' => 'Ajout d\'un site',
            'categories' => $this->categoryModel->listForUi(),
        ];
    }

    public function insert(): array
    {
        $userId = $this->userId();
        $titre = trim((string) filter_input(INPUT_POST, 'titre', FILTER_UNSAFE_RAW));
        $url = trim((string) filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL));
        $description = trim((string) filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW));
        $categorieId = (int) filter_input(INPUT_POST, 'id_categorie', FILTER_SANITIZE_NUMBER_INT);

        if ($titre !== '' && $url !== '' && $description !== '' && $categorieId > 0) {
            $this->siteModel->create($titre, $url, $description, $categorieId, $userId);
            header('Location: index.php?page=site&action=list');
            exit;
        }

        header('Location: index.php?page=site&action=add');
        exit;
    }

    public function edit(): array
    {
        $userId = $this->userId();
        $id = (int) filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        return [
            'titre' => 'Modifier un site',
            'description' => 'Edition',
            'site' => $this->siteModel->selectByIdForUser($id, $userId),
            'categories' => $this->categoryModel->listForUi(),
        ];
    }

    public function update(): array
    {
        $userId = $this->userId();
        $id = (int) filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $titre = trim((string) filter_input(INPUT_POST, 'titre', FILTER_UNSAFE_RAW));
        $url = trim((string) filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL));
        $description = trim((string) filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW));
        $categorieId = (int) filter_input(INPUT_POST, 'id_categorie', FILTER_SANITIZE_NUMBER_INT);

        if ($id > 0 && $titre !== '' && $url !== '' && $description !== '' && $categorieId > 0) {
            $this->siteModel->updateSite($id, $titre, $url, $description, $categorieId, $userId);
        }

        header('Location: index.php?page=site&action=list');
        exit;
    }

    public function delete(): array
    {
        $userId = $this->userId();
        $id = (int) filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id > 0) {
            $this->siteModel->deleteForUser($id, $userId);
        }

        header('Location: index.php?page=site&action=list');
        exit;
    }
}