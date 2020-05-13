{include 'header.tpl'}


    <div class="row">
        <table class="table col-sm">
            <tbody>
            {foreach $categories item=category}
                <tr>
                    <td>{$category->deporte}</td>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                    <td><button type="button" class="btn btn-warning">Editar</button></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        <table class="table col-sm">
            <tbody>
            {foreach $items item=tournament}
                <tr>
                    <td>{$tournament->torneo}</td>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                    <td><button type="button" class="btn btn-warning">Editar</button></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        
    </div>




{include 'footer.tpl'}