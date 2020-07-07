<?php

require_once 'models/tournament.model.php';
require_once 'models/category.model.php';
require_once 'models/images.model.php';
require_once 'models/user.model.php';
require_once 'views/admin.view.php';
require_once 'views/error.view.php';
require_once 'helpers/auth.helper.php';
class AdminController
{
    private $modelItem;
    private $modelCategory;
    private $modelUser;
    private $view;
    private $viewError;
    private $admin;

    public function __construct()
    {
        $this->modelItem = new TournamentModel();
        $this->modelCategory = new CategoryModel();
        $categories = $this->modelCategory->getCategoryList();
        $itemList = $this->modelItem->getItemList();
        $this->modelImg = new Images();
        $this->modelUser = new UsersModel();
        $this->view = new AdminView($categories, $itemList);
        $this->viewError = new ErrorView();
        AuthHelper::checkLogged();
        $this->admin = AuthHelper::role();
    }

    /**
     * Muestra pag principal 
     */
    public function showAdminPage()
    {
        if ($this->admin) {
            $this->view->adminPage();
        } else {
            $this->viewError->showError("Regístrese como administrador para acceder a esta página", 'index');
        }
    }

    /**
     * Nueva categoría
     */
    public function addCategory()
    {
        $newSport = $_POST['newSport'];
        if (empty($newSport)) {
            $this->viewError->showError("Faltan datos obligatorios", 'adminPage');
            die();
        }
        $this->modelCategory->insert($newSport);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Toma la/las img en carpeta temporal y la/las mueve a su ubicación final
     * Devuelve ubicación final
     */
    public function moveImg()
    {
        $fileName = $_FILES['img']['name'];
        $fileType = $_FILES['img']['type'];

        if ($fileType == "image/jpg" || $fileType == "image/jpeg" || $fileType == "image/png" || $fileType == null) {
            if ($fileName) {
                //nombre temporal
                $source = $_FILES["img"]["tmp_name"];
                $finalName = "img/" . uniqid("", true) . "." . strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                move_uploaded_file($source, $finalName);
            }
            return $finalName;
        } else {
            $this->viewError->showError("Tipo de archivo incorrecto", 'adminPage');
            die();
        }
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
        $finalName = $this->moveImg();

        //verificación 
        if (empty($tournament && $idSportFK && $country && $description)) {
            $this->viewError->showError("Faltan datos obligatorios", 'adminPage');
            die();
        }
        //ultimo id ítem
        $itemId = $this->modelItem->addItem($tournament, $idSportFK, $country, $description);
        //inserción de img
        $this->modelImg->addImgs($itemId, $finalName);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Eliminación de ítem
     */
    public function deleteItem($idItem)
    {
        //traigo la ruta de la imagen
        $path = $this->modelImg->getImgPath($idItem);
        //uso la ruta para eliminar la imagen 
        unlink($path->ruta);

        $success = $this->modelImg->deleteImg($idItem);
        $success = $this->modelItem->deleteItem($idItem);
        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Obtiene la info para mostrarla en la pantalla de edición
     */
    public function editView($idItem)
    {
        $infoItem = $this->modelItem->getItemInfo($idItem);
        $img =  $this->modelImg->getImgPath($idItem);
        if ($img) {
            $imgPath = $img->ruta;
        } else {
            $imgPath = 'img/default-image.png';
        }
        $this->view->editView($infoItem, $imgPath);
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
        $finalName = $this->moveImg();

        if (empty($tournament && $idSportFK && $country && $description)) {
            $this->viewError->showError("Faltan datos obligatorios", 'adminPage');
            die();
        }

        $this->modelItem->editItem($idItem, $tournament, $idSportFK, $country, $description);
        $this->modelImg->addImgs($idItem, $finalName);

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
            $this->viewError->showError("Faltan datos obligatorios", 'adminPage');
            die();
        }
        $this->modelCategory->editCategory($idCategory, $sport);

        header('Location: ' . BASE_URL . "adminPage");
    }

    /**
     * Borrado de categoría
     */
    public function deleteCategory($idCategory)
    {
        $itemList = $this->modelItem->getItemListById($idCategory);

        if (!empty($itemList)) {
            $this->viewError->showError("Elmine los torneos asociados a este deporte", 'adminPage');
            die();
        } else {
            $this->modelCategory->deleteCategory($idCategory);
        }
        header('Location: ' . BASE_URL . "adminPage");
    }
    /**
     * Obtiene todos los usuarios registrados
     */
    public function getUsers()
    {
        $users = $this->modelUser->getUsers();

        $this->view->usersList($users);
    }
    /**
     * Edita el rol del usuario, para hacerlo administrador
     */
    public function editUserRole($userID)
    {
        $user = $this->modelUser->getUser($userID);

        if (!empty($user)) {
            $userID = $user->id_usuario;
            $this->modelUser->editUserRole($userID);
        }

        header('Location: ' . BASE_URL . "users");
    }

    /**
     * Elimina un usuario
     */
    public function deleteUser($userID)
    {
        $this->modelUser->delete($userID);

        header('Location: ' . BASE_URL . "users");
    }

    /**
     * Elimina solo la img
     */
    public function deleteImg($idItem)
    {
        $path = $this->modelImg->getImgPath($idItem);
        //uso la ruta para eliminar la imagen 
        unlink($path->ruta);

        $success = $this->modelImg->deleteImg($idItem);

        if (isset($success)) {
            header('Location: ' . BASE_URL . "editView/" . $idItem);
        } else {
            $this->viewError->showError("No se pudo eliminar la imagen.", 'adminPage');
        }
    }
}
