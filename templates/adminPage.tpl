{include 'header.tpl'}


    <div class="row">
       <div class="col-md-6">
        <table class="table">
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
        </div>
          

        <div class="col-md-6">
        {foreach $items item=tournament}
        <table class="table">
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
    </div>
    
{/foreach}



{include 'footer.tpl'}