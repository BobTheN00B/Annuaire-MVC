<?php

require_once __DIR__ . '/../Models/SiteModel.php';
require_once __DIR__ . '/../Models/CategoryModel.php';
/**
 * Contrôleur de la page publique de l'annuaire.
 */
class HomeController {

    

    /**
     * Liste publique avec filtres (catégorie + mot-clé).
     * @return array
     */
    public function list(): array 
    {
        $rawCategorie = filter_input(INPUT_GET, 'categorie', FILTER_SANITIZE_NUMBER_INT);
        $selectedCategorie = (int) $rawCategorie;
        $selectedCategorie = $selectedCategorie > 0 ? $selectedCategorie : null;

        $motcle = trim((string) filter_input(INPUT_GET, 'motcle', FILTER_UNSAFE_RAW));
        $motcle = preg_replace('/\s+/', ' ', $motcle);

        $errorMessage = null;
        $sites = [];
        $categories = [];

        try {
            $siteModel = new SiteModel();
            $categoryModel = new CategoryModel();
            $sites = $siteModel->search($selectedCategorie, $motcle);
            $categories = $categoryModel->list()->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $exception) {
            $errorMessage = 'Le service de données est momentanément indisponible. Réessayez dans quelques instants.';
        }

        $hasFilters = $selectedCategorie !== null || $motcle !== '';

        return [
            'titre' => 'Annuaire de sites web',
            'description' => 'Recherchez des sites par catégorie ou par mot-clé.',
            'errorMessage' => $errorMessage,
            'categories' => $categories,
            'sites' => $sites,
            'selectedCategorie' => $selectedCategorie,
            'motcle' => $motcle,
            'hasFilters' => $hasFilters,
            'resultCount' => count($sites),
        ];
    }
}
