<?php

require_once __DIR__ . '/../Models/CategoryModel.php';

/**
 * Description of CategoryController
 *
 * @author Kevin
 */
class CategoryController {

    private $_model;

    /**
     * Instancie notre model
     */
    public function __construct() {
        $this->_model = new CategoryModel();
    }

    /**
     * Retourne un tableau associatif
     * @return Array
     */
    public function list() {
        return ["titre" => "Listing des catégories",
            "description" => "Liste des categories",
            "categories" => $this->_model->listForUi()
        ];
    }

    public function add() {
        return ["titre" => "Ajout des catégories",
            "description" => "Ajout des categories"
        ];
    }

    public function delete() {
        $id = filter_var(strip_tags(trim($_GET['id'])), FILTER_SANITIZE_NUMBER_INT);
        $this->_model->delete($id);
        header("location: index.php?page=categorie&action=list");
        exit;
    }

    public function insert() {
        if (isset($_POST['libelle'])) {
            $libelle = trim((string) filter_input(INPUT_POST, 'libelle', FILTER_UNSAFE_RAW));
            $libelle = strip_tags($libelle);
            if ($libelle === '') {
                header("location: index.php?page=categorie&action=add");
                exit;
            }
            $this->_model->insert($libelle);
            header("location: index.php?page=categorie&action=list");
            exit;
        } else {
            header("location: index.php?page=categorie&action=add");
            exit;
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            return ["titre" => "Ajout des catégories",
                "description" => "Ajout des categories",
                "categorie" => $this->_model->selectById((int) $_GET['id'])
            ];
        } elseif($_SERVER['REQUEST_METHOD'] == "POST") {
            $libelle = trim((string) filter_input(INPUT_POST, 'libelle', FILTER_UNSAFE_RAW));
            $libelle = strip_tags($libelle);
            $id = filter_var(strip_tags(trim($_POST['id'])), FILTER_SANITIZE_STRING);
            $this->_model->update($id, $libelle);
            header("location: index.php?page=categorie&action=list");
            exit;
        }
    }
}
