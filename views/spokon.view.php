<?php

class SpokonView
{



    public function showItemList($itemList)
    {

        echo '<h1> Bienvenidos a SPOKON</H1>';
        echo '<h3> El sitio para disfrutar de tus deportes favoritos </h3>';

        //var_dump($itemList);
        echo '<ul>';
        foreach ($itemList as $item) {
            echo '<li>' . $item->torneo . ' </li>';
        }
        echo '</ul>';
    }
    
    public function showCategoryList($categories)
    {
        
        
        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li>' . $category->deporte . '</li>';
            echo '<li><a href="tournament/' . $category->id_deporte . '">Ver</a>';
        }
        echo '</ul>';
    }

    public function showItemListById($itemListById, $tournamentById)
    {
        echo '<h1> Bienvenidos a SPOKON</H1>';
        echo '<h3> El sitio para disfrutar de tus deportes favoritos </h3>';
        echo '<h4>'. $tournamentById->deporte . '</h4>';
        echo '<ul>';
        foreach ($itemListById as $item) {
            echo '<li>' . $item->torneo . ' </li>';
        }
        echo '</ul>';
    }
}