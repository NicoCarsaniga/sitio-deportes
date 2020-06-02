{include 'header.tpl'}

    <div class="row">  
    {include 'showItemList.tpl'}
        <div class="col-md-9 text-center">
            <table class="table table-info">
                <thead >
                    <th>
                        <h3><b>Estos son los torneos más votados</b></h3>
                    </th>
                </thead>
            </table>
                {foreach $top3 item=torneo}
                    <div class="card mb-3">
                        <h5 class="card-header">{$torneo->torneo}</h5>
                    <div class="card-body">
                        <h6 class="card-subtitle text-muted">{$torneo->pais}</h6>
                    </div>
                        <img class="img-thumbnail" src="img/{$torneo->imagen}" alt="{$torneo->torneo}">
                    <div class="card-body">
                        <p class="card-text">{$torneo->descripcion}</p>
                    </div>
                {/foreach}
        </div>
    </div>
</div>
{include 'footer.tpl'}