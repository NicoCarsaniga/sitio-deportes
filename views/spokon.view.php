<?php

class SpokonView {
    
    public function showItemList($itemList){
    echo '<h1> Bienvenidos a SPOKON</H1>';
    echo '<h3> Tu sitio para disfrutas de tus deportes favoritos </h3>';
    //var_dump($itemList);
    echo '<ul>';
        foreach ($itemList as $item){
            echo '<li>' . $item->torneo . ' </li>';
        }
    }
}