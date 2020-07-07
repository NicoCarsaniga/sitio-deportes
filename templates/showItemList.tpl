
<div class="tarjeta col-md-3 col-sm-12" >
    {foreach $itemList item = $article}
        <div class="card mb-3">
            <h4 class="card-header text-center"><a class="nav-link" href="item/{$article->id_torneo}">{$article->torneo}</a></h4>
        </div>
    {/foreach} 
</div>