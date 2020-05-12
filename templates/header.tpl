<!DOCTYPE html>
    <html lang="es">
    <head>
        <base href="{BASE_URL}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <title>Spokon | tv</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-3">
        <a class="navbar-brand" href="">Spokon.tv</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                {foreach $categories item=category}
                    <li class="nav-item active">
                        <a class="nav-link" href="tournament/{$category->id_deporte}">{$category->deporte}</a>
                    </li>
                {/foreach}
            </ul>
        </div>
        </nav>
    <div class="text-center container">
        <h1> Bienvenidos a SPOKON</h1>
        <h3> Tu sitio para disfrutar de tus deportes favoritos </h3>
    