{include 'headerAdmin.tpl'}
<div class="container">
    <form action="editCat" method="post">
        <div class="form-row">
            <input type="hidden" value="{$infoCategory->id_deporte}" name="idCategory">
            <label for="validationServer01">Torneo: </label>
            <input type="text" class="form-control col-md-3" id="validationServer01" value="{$infoCategory->deporte}" name="sport" required>
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
</div>