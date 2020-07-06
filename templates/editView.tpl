{include 'headerAdmin.tpl'}

<form action="edit" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <input type="hidden" value="{$infoItem->id_torneo}" name="idItem">
    <div class="col-md-6 mb-3">
      <label for="validationServer01">Torneo</label>
      <input type="text" class="form-control" id="validationServer01" value="{$infoItem->torneo}" name="tournament" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer02">País</label>
      <input type="text" class="form-control" id="validationServer02" value="{$infoItem->pais}" name="country" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationServer03">Descripción</label>
      <input type="text" class="form-control" id="validationServer03" value="{$infoItem->descripcion}" name="description" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer04">Deporte</label>
      <select name='idSportFK' class="form-control"class="custom-select" required>
        <option selected>Seleccione una Categoría</option>
            <{foreach $categories item=category}
                <option value="{$category->id_deporte}">{$category->deporte}</option>
            {/foreach}
    </select>
  </div>
  </div>
  <div class="form-row">
    <div class="custom-file col-md-6 mb-3">
        <input type="file" class="form-control" id="img" value="{$img}" name="img"  multiple="">
        {if $img != 'img/default-image.png'}
          <a class="btn btn-danger" href="deleteImg/{$infoItem->id_torneo}">Eliminar imagen</a>
        {/if}
    </div>
    <img class="img-thumbnail img-fluid" src="{$img}" alt="{$infoItem->torneo}">
  </div>
  <div class="form row">
    <button class="btn btn-success" type="submit">Confirmar Edición</button>
    <h5><a class="btn btn-warning mb-3 " href="{$base_url}/adminPage">Volver</a></h5>
  </div>
</form>



{include 'footer.tpl'}
