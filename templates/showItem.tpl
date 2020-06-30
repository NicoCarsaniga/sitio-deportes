{include 'header.tpl'}
        <input type="hidden" id="rol" value="{$ROL}">
        <input type="hidden" id="user" value="{$USER}">
        <input type="hidden" id="itemId" value="{$infoTorneo->id_torneo}">
        <h2>{$infoTorneo->deporte}</h2>
        <div class="card mb-3 text-center">
            <h3 class="card-header">{$infoTorneo->torneo}</h3>
            <div class="card-body">
            <h6 class="card-subtitle text-muted">{$infoTorneo->pais}</h6>
        </div>
            <img class="img-thumbnail" src="img/{$infoTorneo->imagen}" alt="{$infoTorneo->torneo}">
        <div class="card-body">
            <p class="card-text">{$infoTorneo->descripcion}</p>
        </div>
    </div>
{include 'vue/comments.vue'}
{include 'footer.tpl'}

