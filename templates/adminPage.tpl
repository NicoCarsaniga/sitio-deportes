{include 'headerAdmin.tpl'}

    <div class="container d-flex flex-wrap align-content-start">
        {include 'formByCategory.tpl'}
        {include 'addItem.tpl'}
    </div>
    <div class="row">
    <div class="col-md-6">
        <table class="table bg-light">
            {foreach $categories item=category}
                <tr>
                    <td>{$category->deporte}</td>
                    <td><a href="editViewCategory/{$category->id_deporte}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                    <td><a href="deleteSport/{$category->id_deporte}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        </div>
        <div class="col-md-6">
            <table class="table bg-light">
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
</div>
</body>
</html>