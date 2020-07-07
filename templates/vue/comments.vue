{literal}

<section id="comments">

    <div v-if="rol==0||rol==1" class="row bg-light text-dark my-1 col-md-10 mx-auto">
        <form class="form-group col-md-8" id="comment-form">
            <label for="comentario">Deja tu comentario</label>
            <textarea class="form-control" id="comentario" rows="3"></textarea>
            <button class="btn btn-outline-success my-1" id="btn-addComment">Comentar</button>
        </form>
        <div class="form-group col-md-1">
            <label for="puntaje">Puntaje</label>
            <select class="form-control" id="puntaje">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
    <div class="mx-auto w-75">
        <div v-if="loading" class="spinner-border"></div>
        <div class="bg-info text-white text-center">
            <p class="h3">Puntaje promedio del Torneo: {{promedio}}</p>
        </div>
        <div class="row">
            <h5 class="col h3">Comentarios</h5>
            <button id="btn-reload" type="button" class="btn bg-info text-white col-md-2">Refrescar</button>
        </div>
        <ul v-if="!loading" id="comments-list" class="list-group list-group-flush">
            <div v-for="comment in comments" class="card">
                <div class="card-header bg-danger d-flex justify-content-between align-items-center row">
                    <p class="col h4">Usuario: {{comment.email}}</p>
                    <p class="col h4">Puntaje: {{comment.votos}}</p>
                    <button v-if="rol == 1" v-on:click="deleteComment(comment.id_comentario)" class="btn btn-danger col-md-2">Eliminar</button>
                </div>
                <div class="card-body h5">
                    {{comment.comentario}}
                </div>
            </div>
        </ul>
    </div>
</section>

{/literal}