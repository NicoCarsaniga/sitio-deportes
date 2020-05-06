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
            echo '<li><a href="tournament/' . $itemList->id_torneo . '">' . $item->torneo . '</a>';
        }
        echo '</ul>';
    }

    public function showCategoryList($categories)
    {


        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li><a href="sport/' . $category->id_deporte . '">' . $category->deporte . '</a>';
        }
        echo '</ul>';
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
}
