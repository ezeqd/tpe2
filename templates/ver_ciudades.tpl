{include file="header.tpl"}

        {foreach from=$lista_ciudades item=ciudad}
            <li>
                {$ciudad->nombre}
                {$ciudad->capacidad}
            </li>
        {/foreach}

        <form action="insertar" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="capacidad" placeholder="Capacidad">
            <input type="submit" value="Insertar">
        </form>
{include file="footer.tpl"}
