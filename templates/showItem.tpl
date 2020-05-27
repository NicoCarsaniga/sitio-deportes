{include 'header.tpl'}
        <h2>{$infoTorneo->deporte}</h2>
        <div class="card mb-3">
            <h3 class="card-header">{$infoTorneo->torneo}</h3>
            <div class="card-body">
            <h6 class="card-subtitle text-muted">{$infoTorneo->pais}</h6>
        </div>
            <img style="height: 200px; width: 100%; display: block;" src="img/{$infoTorneo->imagen}" alt="{$infoTorneo->torneo}">
        <div class="card-body">
            <p class="card-text">{$infoTorneo->descripcion}</p>
        </div>
    </div>
{include 'footer.tpl'}

