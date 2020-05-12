{include 'header.tpl'}


    <div class="row">
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
    
{/foreach}



{include 'footer.tpl'}