{include 'headerAdmin.tpl'}


    <table class="table bg-light">
        {foreach $users item=user}
            <tr>
                <td>{$user->email}</td>
                <td>{$user->nombre}</td>
                <td>{$user->apellido}</td>
                {if !$user->rol == 1}
                <td><a href="editRole/{$user->email}" class="btn btn-warning">Hacer Administrador</a></td>
                <td><a href="deleteUser/{$user->id_usuario}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></td>    
                {else}
                <td>El Usuario ya es administrador</td>
                <td></td>
                {/if}
            </tr>
        {/foreach}
    </table>