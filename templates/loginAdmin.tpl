{include 'headerAdmin.tpl'}

<form method="POST" action="verify" class="col-md-4 offset-md-4 mt-4">
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="adminUser" class="form-control" aria-describedby="emailHelp" placeholder="Ingrese su email">
      <small id="emailHelp" class="form-text text-muted">Ingrese su usuario de administrador</small>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
        <input type="submit" class="btn btn-primary"/>
</form>

{include 'footer.tpl'}