{include 'header.tpl'}

        
        <h4>{$tournamentById->deporte}</h4>

        <ul class="ul-itemList list-group">
        {foreach  $itemListById item=article}
            <li><a class="nav-link list-group-item" href="item/{$article->id_torneo}">{$article->torneo}</a></li>
        {/foreach}
        </ul>
    </div>
{include 'footer.tpl'}