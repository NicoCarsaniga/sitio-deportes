  
<ul class="list-group list-group-flush list-inline">
    {foreach $itemList item = $article}
        <li class="list-group-item flex-fill list-inline-item">
            <div class="card mb-3">
                <h3 class="card-header"><a class="nav-link" href="item/{$article->id_torneo}">{$article->torneo}</a></h3>
        </li>
    {/foreach}
</ul>    
    