
<div class="row">
    {foreach $itemList item = $article}
        <div class="col-md-4 ">
            <div class="card mb-3">
                <h3 class="card-header"><a class="nav-link" href="item/{$article->id_torneo}">{$article->torneo}</a></h3>
            </div>
        </div>
    {/foreach} 
</div>