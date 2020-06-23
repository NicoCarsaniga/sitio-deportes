<?php

require_once 'models/tournament.model.php';
require_once 'models/category.model.php';
require_once 'models/images.model.php';
require_once 'views/admin.view.php';
require_once 'views/spokon.view.php';
require_once 'helpers/auth.helper.php';
class AdminController
{

    private $modelItem;
    private $modelCategory;
    private $view;
    private $viewSpokon;

    public function __construct()
    {

        $this->modelItem = new TournamentModel();
        $this->modelCategory = new CategoryModel();
        $categories = $this->modelCategory->getCategoryList();
        $this->modelImg = new Images();
        $this->view = new AdminView($categories);
        $this->viewSpokon = new SpokonView($categories);
        AuthHelper::checkLogged();
    }

    /**
     * Muestra pag principal 
     */
    public function showAdminPage()
    {
        $itemList = $this->modelItem->getItemList();
        $this->view->adminPage($itemList);
    }

    /**
     * Nueva categoría
     */
    public function addCategory()
    {
        $newSport = $_POST['newSport'];
        if (empty($newSport)) {
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }
        $this->modelCategory->insert($newSport);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Nuevo ítem
     */
    public function addItem()
    {
        $tournament = $_POST['tournament'];
        $idSportFK = $_POST['idSportFK'];
        $country = $_POST['country'];
        $description = $_POST['description'];

        //verificación 
        if (empty($tournament | $idSportFK | $country | $description)) {
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }
        //ultimo id ítem
        $itemId = $this->modelItem->addItem($tournament, $idSportFK, $country, $description);
        //inserción de img
        $this->modelImg->addImgs($itemId);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Eliminación de ítem
     */
    public function deleteItem($idItem)
    {
        $success = $this->modelItem->deleteItem($idItem);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Obtiene la info para mostrarla en la pantalla de edición
     */
    public function editView($idItem)
    {
        $infoItem = $this->modelItem->getItemInfo($idItem);
        $categories = $this->modelCategory->getCategoryList();

        $this->view->editView($infoItem, $categories);
    }

    /**
     * Edición per se del ítem
     */
    public function confirmEdition()
    {
        $idItem = $_POST['idItem'];
        $tournament = $_POST['tournament'];
        $idSportFK = $_POST['idSportFK'];
        $country = $_POST['country'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        if (empty($tournament || $idSportFK || $country || $description || $img)) {
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }

        $this->modelItem->editItem($idItem, $tournament, $idSportFK, $country, $description, $img);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     *  Vista de la edición de la categoría con la info de la misma
     */
    public function editViewCategory($idCategory)
    {
        $infoCategory = $this->modelCategory->getCategoryById($idCategory);
        $this->view->editCategoryView($infoCategory);
    }
    /**
     * Edición per se de la categoría
     */
    public function confirmEditCat()
    {
        $idCategory = $_POST['idCategory'];
        $sport = $_POST['sport'];
        if (empty($sport)) {
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }
        $this->modelCategory->editCategory($idCategory, $sport);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Edición de la categoría
     */
    public function deleteCategory($idCategory)
    {

        $itemList = $this->modelItem->getItemListById($idCategory);

        if (!empty($itemList)) {
            $this->viewSpokon->showError("Elmine los torneos asociados a este deporte");
            die();
        } else {
            $this->modelCategory->deleteCategory($idCategory);
        }

        header('Location: ' . BASE_URL . "adminPage");
    }
}
