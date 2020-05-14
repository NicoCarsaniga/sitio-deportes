{include 'headerAdmin.tpl'}
{include 'formByCategory.tpl'}
{include 'addItem.tpl'}

    <div class="row">
    <div class="col-md-6">
        <table class="table">
            {foreach $categories item=category}
                <tr>
                <td>{$category->deporte}</td>
                    <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                    <td><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        </div>
        <div class="col-md-6">
            <table class="table">
                <tbody>
                {foreach $items item=tournament}
                    <tr>
                        <td>{$tournament->torneo}</td>
                        <td><a href="editView/{$tournament->id_torneo}" class="btn btn-warning"><i class="fas fa-edit"></i></td>
                        <td><a href="delete/{$tournament->id_torneo}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>


{include 'footer.tpl'}