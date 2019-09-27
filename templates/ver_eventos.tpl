{include file="header.tpl"}

        {foreach from=$lista_eventos item=evento}
            <li>            
                {$evento->nombre} 
                {$evento->fecha} 
                {$evento->organizador} 
                {$evento->id_ciudad}
            </li>       
        {/foreach}

        <form action="insertar" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="fecha" placeholder="Fecha">
            <input type="text" name="organizador" placeholder="Organizador">
            <input type="text" name="ciudad" placeholder="Ciudad">
            <input type="submit" value="Insertar">
        </form>
    </body>
</html>
