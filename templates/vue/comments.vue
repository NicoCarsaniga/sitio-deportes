{literal}

<section id="comments">

    <div v-if="rol==0||rol==1" class="row bg-secondary text-white my-1 col-md-10 mx-auto">
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
        <h5>Comentarios</h5>
        <div v-if="loading" class="spinner-border"></div>
        <div class="bg-primary text-center">
            <p class="h3">Puntaje Promedios del Torneo: {{promedio}}</p>
        </div>
        <button id="btn-reload" type="button" class="btn btn-primary btn-block">Refrescar</button>
        <!--Quiero sacarlo!!-->
        <ul v-if="!loading" id="comments-list" class="list-group list-group-flush">
            <div v-for="comment in comments" class="card">
                <div class="card-header bg-secondary d-flex justify-content-between align-items-center my-1 row">
                    <div class="col">
                        <p>Usuario: {{comment.email}}</p>
                    </div>
                    <div class="col">
                        <p>Nombre: {{comment.nombre}} {{comment.apellido}}</p>
                    </div>
                </div>
                <div class="card-body my-1">
                    {{comment.comentario}}
                    <button v-if="rol == 1" v-on:click="deleteComment(comment.id_comentario)" class="btn btn-danger">Eliminar</button>
                </div>
                <div class="card-footer bg-light text-muted my-1">
                    <div class="col">
                        <p>Puntaje: {{comment.votos}}</p>
                    </div>
                </div>

            </div>
        </ul>
    </div>
</section>

{/literal}