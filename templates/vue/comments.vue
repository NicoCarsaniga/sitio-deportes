{literal}
<section class="" id="comments">

    <div v-if="rol==0||rol==1" class="row bg-light my-1">
        <form class="form-group col-md-8" id="comment-form">
            <textarea class="form-control" id="comentario" rows="3"></textarea>
            <label for="comentario">Deja tu comentario</label>
            <button class="btn btn-outline-success my-1" id="btn-addComment">Comentar</button>
        </form>
        <div class="form-group col-md-1">
            <label for="puntaje">Puntaje</label>
            <select class="form-control" id="puntaje">
                <option value="1">1</i></option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>

    <div v-if="loading">
        Cargando...
    </div>
    <button id="btn-reload" type="button" class="btn btn-primary btn-sm">Refrescar</button><!--Quiero sacarlo!!-->

    <ul v-if="!loading" id="comments-list" class="list-group list-group-flush bg-light">
        <div v-for="comment in comments" class="card">
            <div class="card-header d-flex justify-content-between align-items-center my-1 row">
                <div class="col"><p>Usuario: {{comment.email}}</p></div> 
                <div class="col"><p>Nombre: {{comment.nombre}} {{comment.apellido}}</p></div> 
            </div>
            <div class="card-body my-1">
                {{comment.comentario}}
            </div>
            <div class="card-footer  text-muted my-1">
                <div class="col"><p>Puntaje: {{comment.votos}}</p></div>
            </div>
        </div>
    </ul>

</section>

{/literal}