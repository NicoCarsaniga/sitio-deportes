{include 'headerAdmin.tpl'}


<form action="edit" method="post">
    <input type="hidden" value="{$infoItem->id_torneo}" name="idItem">
    <input type="text" value="{$infoItem->torneo}" name="tournament">
    <input type="text" value="{$infoItem->pais}" name="country">
    <input type="text" value="{$infoItem->descripcion}" name="description">
    <input type="text" value="{$infoItem->imagen}" name="img">
    <select name='idSportFK' class="form-control">
        <option selected>Seleccione una Categoria</option>
        <{foreach $categories item=category}
            <option value="{$category->id_deporte}">{$category->deporte}</option>
        {/foreach}
    </select>
    <button type="submit">Confirmar Edición</button>
</form>

{include 'footer.tpl'}