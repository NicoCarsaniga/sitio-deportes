{include 'header.tpl'}
        <h2 class="font-weight-bold">{$infoTorneo->deporte}</h2>
        <section class="card mb-3 text-center" id="info-item" data-item-id={$infoTorneo->id_torneo}>
            <h3 class="card-header">{$infoTorneo->torneo}</h3>
            <div class="card-body">
            <h6 class="card-subtitle text-muted">{$infoTorneo->pais}</h6>
        </section>
            <img class="img-thumbnail mx-auto d-block img-fluid" src="img/{$img}" alt="{$infoTorneo->torneo}">
        <div class="card-body">
            <p class="card-text bg-secondary text-center">{$infoTorneo->descripcion}</p>
        </div>
    </div>
{include 'vue/comments.vue'}
{include 'footer.tpl'}

