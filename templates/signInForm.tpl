{include 'header.tpl'}

<form action="signNewUser" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" name="mail" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Contraseña</label>
            <input type="password" name="pass" class="form-control" placeholder="Contraseña">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Nombre</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="inputCity">Apellido</label>
            <input type="text" name="surname" class="form-control">
            <input type="hidden" name="rol" value="0">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Registrarse</button>
</form>

{include 'footer.tpl'}