<?php

require_once __DIR__ . '/../Models/SiteModel.php';
require_once __DIR__ . '/../Models/CategoryModel.php';
/**
 * Contrôleur de la page publique de l'annuaire.
 */
class HomeController {

    private SiteModel $siteModel;
    private CategoryModel $categoryModel;
    
    public function __construct() {
        $this->siteModel = new SiteModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Liste publique avec filtres (catégorie + mot-clé).
     * @return array
     */
    public function list() {
        $rawCategorie = filter_input(INPUT_GET, 'categorie', FILTER_SANITIZE_NUMBER_INT);
        $selectedCategorie = (int) $rawCategorie;
        $selectedCategorie = $selectedCategorie > 0 ? $selectedCategorie : null;

        $motcle = trim((string) filter_input(INPUT_GET, 'motcle', FILTER_UNSAFE_RAW));

        $sites = $this->siteModel->search($selectedCategorie, $motcle);

        return [
            'titre' => 'Annuaire de sites web',
            'description' => 'Recherchez des sites par catégorie ou par mot-clé.',
            'categories' => $this->categoryModel->list(),
            'sites' => $sites,
            'selectedCategorie' => $selectedCategorie,
            'motcle' => $motcle,
            'resultCount' => count($sites),
        ];
    }

}
