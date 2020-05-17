{include 'headerAdmin.tpl'}

<form action="edit" method="post">
  <div class="form-row">
    <input type="hidden" value="{$infoItem->id_torneo}" name="idItem">
    <div class="col-md-6 mb-3">
      <label for="validationServer01">Torneo</label>
      <input type="text" class="form-control" id="validationServer01" value="{$infoItem->torneo}" name="tournament" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer02">Pais</label>
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
        <option selected>Seleccione una Categoria</option>
            <{foreach $categories item=category}
                <option value="{$category->id_deporte}">{$category->deporte}</option>
            {/foreach}
    </select>
    </div>
  </div>
  <div class="form-row">
    <div class="custom-file col-md-6 mb-3">
        <input type="file" class="custom-file-input form-control" id="validatedCustomFile" value="{$infoItem->imagen}" name="img">
        <label class="custom-file-label" for="validatedCustomFile">Eliga una Imagen...</label>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Confirmar Edición</button>
</form>



{include 'footer.tpl'}
