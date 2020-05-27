{include 'header.tpl'}

        
        <h4>{$tournamentById->deporte}</h4>

        <ul class="ul-itemList">
        {foreach  $itemListById item=article}
            <li><a class="nav-link" href="item/{$article->id_torneo}">{$article->torneo}</a></li>
        {/foreach}
        </ul>
    </div>
{include 'footer.tpl'}