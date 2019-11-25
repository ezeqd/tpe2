{include file="header.tpl"}
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Capacidad</th>
              {if isset($userName)}
                <th scope="col">Borrar</th>
                <th scope="col">Editar</th>
              {/if}
            </tr>
          </thead>
          <tbody>
        {foreach from=$lista_ciudades item=ciudad}
            <tr>
                <td>{$ciudad->nombre}</td>
                <td>{$ciudad->capacidad}</td>
            {if isset($userName)}
                <td>
				<form action="ciudades/borrar/{$ciudad->id_ciudad}"><button type="submit">Borrar</button></form>
				</td>
				<td>
				<form action="ciudades/formeditar/{$ciudad->id_ciudad}"><button type="submit">Editar</button></form>
				</td>
            {/if}
            </tr>
        {/foreach}
        </tbody>
        </table>
        {if isset($userName)}
        <form action="ciudades/insertar" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="capacidad" placeholder="Capacidad">
            <input type="submit" value="Insertar">
        </form>
        {/if}
{include file="footer.tpl"}
