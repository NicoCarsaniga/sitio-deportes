
<h3>Agregar Nuevo Torneo</h3>
<form action="addItem" method="post">
    <div class="col-3">
        <input name="tournament" type="text" class="form-control" placeholder="Torneo">
    </div>
    <div class="col-3">
        <select class="form-control">
            <option selected>Elija un deporte</option>
            <{foreach $categories item=category}
                <option name="{$category->id_deporte}">{$category->deporte}</option>
            {/foreach}
        </select>
    </div>
    <div class="col-3">
        <input name="country" type="text" class="form-control" placeholder="País">
    </div>
    <div class="col-3">
        <input name="description" type="text" class="form-control" placeholder="Descripción">
    </div>
    <div class="col-3">
        <input name="img" type="text" class="form-control" placeholder="Imagen">
    </div>
    <div class="col-3">
        <button type="submit" class="btn btn-success"><i class="far fa-share-square"></i></button>
    </div>
</form>