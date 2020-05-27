{include 'header.tpl'}
        <h4>{$tournamentById->deporte}</h4>

        <ul class="list-group">
        {foreach  $itemListById item=article}
            <li class="list-group-item"><a class="nav-link" href="item/{$article->id_torneo}">{$article->torneo}</a></li>
        {/foreach}
        </ul>
    </div>
{include 'footer.tpl'}