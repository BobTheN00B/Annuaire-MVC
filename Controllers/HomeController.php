<?php
/**
 * Class d'un controlleur très simple.
 */
declare(strict_types=1);
require_once __DIR__ . '/../Models/CategoryModel.php';
require_once __DIR__ . '/../Models/SiteModel.php';

class HomeController
{
    private SiteModel $siteModel;
    private CategoryModel $categoryModel;

    public function __construct(){
        $this->siteModel = new SiteModel();
        $this->categoryModel = new CategoryModel();
    }

    public function list(): array
    {
        $categorieIdRaw = filter_input(INPUT_GET, 'categorie', FILTER_SANITIZE_NUMBER_INT);
        $keywordRaw = filter_input(INPUT_GET, 'motcle', FILTER_UNSAFE_RAW);

        $categorieId = ($categorieIdRaw !== null && $categorieIdRaw !== false && (int) $categorieIdRaw > 0)
            ? (int) $categorieIdRaw
            : null;
        $keyword = trim((string) ($keywordRaw ?? ''));

        return [
            'titre' => 'Annuaire de sites web',
            'description' => 'Recherchez des sites par catégorie ou mot-clé.',
            'categories' => $this->categoryModel->list(),
            'selectedCategorie' => $categorieId,
            'motcle' => $keyword,
            'sites' => $this->siteModel->search($categorieId, $keyword),
        ];
    }

}
