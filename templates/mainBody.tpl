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
                        <h5 class="card-header"><a class="nav-link" href="item/{$torneo->id_torneo}">{$torneo->torneo}</a></h5>
                    <div class="card-body">
                        <h6 class="card-subtitle text-muted">{$torneo->pais}</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{$torneo->descripcion}</p>
                    </div>
                {/foreach}
        </div>
    </div>
</div>
{include 'footer.tpl'}