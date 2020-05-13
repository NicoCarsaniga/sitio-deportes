{include 'header.tpl'}


    <div class="row">
            {foreach $categories item=category}
                <tr>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                    <td><button type="button" class="btn btn-warning">Editar</button></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        <table class="table col-sm">
        </div>
          

        <div class="col-md-6">
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



{include 'footer.tpl'}