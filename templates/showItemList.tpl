{include 'header.tpl'}

        <h1> Bienvenidos a SPOKON</h1>
        <h3> Tu sitio para disfrutas de tus deportes favoritos </h3>
        
        
        <ul>
            {foreach $itemList item = $article}
                <li>{$article->torneo} </li>
            {/foreach}
        </ul>    
         