
<form class="col-6" action="addItem" method="post">
    <h3>Agregar Nuevo Torneo</h3>
    <div class="col-6">
        <input name="tournament" type="text" class="form-control" placeholder="Torneo">
    </div>
    <div class="col-6 mt-4">
        <select name='idSportFK' class="form-control">
            <option selected>Elija un deporte</option>
            <{foreach $categories item=category}
                <option value="{$category->id_deporte}">{$category->deporte}</option>
            {/foreach}
        </select>
    </div>
    <div class="col-6 mt-4">
        <input name="country" type="text" class="form-control" placeholder="País">
    </div>
    <div class="col-6 mt-4">
        <input name="description" type="text" class="form-control" placeholder="Descripción">
    </div>
    <div class="col-6 mt-4">
        <input name="img" type="text" class="form-control" placeholder="Imagen">
    </div>
    <div class="col-6 mt-4">
        <button type="submit" class="btn btn-success"><i class="far fa-share-square"></i></button>
    </div>
</form>