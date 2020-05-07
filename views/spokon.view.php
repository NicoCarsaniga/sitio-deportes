<?php

class SpokonView{

    private function trashCode() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Spokon|tv</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">Spokon.tv</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="listar">Home <span class="sr-only">(current)</span></a>
                </li>
                </ul>
            </div>
            </nav>';
    
        return $html;
    }

    
    
    public function showItemList($itemList){

        echo $this->trashCode();
        
        echo '<h1> Bienvenidos a SPOKON</h1>';
        echo '<h3> Tu sitio para disfrutas de tus deportes favoritos </h3>';
        
        //var_dump($itemList);
        echo '<ul>';
            foreach ($itemList as $item){
                echo '<li><a href="item/' . $item->id_torneo . '">' . $item->torneo . '</a></li>';
        echo '</ul>';       
            }
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


        

        echo '<h3>Agregar campo</h3>';

        echo '<form action="addCategory" method="post">
                <div class="form-row">
                    <div class="col">
                        <input name="newSport" type="text" class="form-control" placeholder="Deporte">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
              </form>';
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
