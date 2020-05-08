<?php

require_once ('libs/Smarty.class.php');

class SpokonView{
   
    public function showItemList($itemList){

        $smarty = new Smarty();

       $smarty->assign('itemList', $itemList);

       $smarty->display('showItemList.tpl');
    }
    public function ShowCategoryList($categories){

        echo '<h3>Lista Categoria</h3>';


        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li><a href="tournament/' . $category->id_deporte . '">' . $category->deporte . '</a></li>';
        }
        echo '</ul>';

        

        $this->addSport();
    }

    public function addSport(){


        $smarty = new Smarty();
        
        $smarty->display('formByCategory.tpl');
    }


    public function showItemListById($itemListById, $tournamentById)
    {
        echo '<h1> Bienvenidos a SPOKON</H1>';
        echo '<h3> El sitio para disfrutar de tus deportes favoritos </h3>';
        echo '<h4>' . $tournamentById->deporte . '</h4>';
        echo '<ul>';
        foreach ($itemListById as $item) {
            echo '<li>' . $item->torneo . ' </li>';
        }
        echo '</ul>';
    }

    public function showItem($infoTorneo)
    {
        //var_dump($infoTorneo);

        echo '<ul>';
        foreach ( $infoTorneo as $info){

            echo '<li>' . $info . '</li>';
        }
        echo '<ul>';
    }
}
