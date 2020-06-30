{literal}
<section id="comments">

    <form id="comment-form" action="addComment" method="post">
        <input type="text" name="title" placeholder="Título">
        <input type="text" name="description" placeholder="Descripción">
        <input type="submit" value="Comentar">
    </form>

    <div v-if="loading">
        Cargando...
    </div>
    <button id="btn-reload" type="button" class="btn btn-primary btn-sm">Refrescar</button>

    <ul v-if="!loading" id="comments-list" class="list-group list-group-flush">
        <div v-for="comment in comments" class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                {{comment.id}}
            </div>
            <div class="card-body">
                {{comment.comentario}}
            </div> 
            <div class="card-footer  text-muted">
                {{comment.usuario}}
            </div>
        </div>
    </ul>

</section>

{/literal}
