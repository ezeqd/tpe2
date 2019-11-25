{include file="header.tpl"}
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Fecha</th>
              <th scope="col">Organizador</th>
              <th scope="col">Ciudad</th>
              <th scope="col">Ver Detalles</th>
              {if isset($userName)}
                <th scope="col">Borrar</th>
                <th scope="col">Editar</th>
              {/if}
            </tr>
          </thead>
          <tbody>
          {foreach from=$lista_eventos item=evento}
                  <tr>
                    <td>{$evento->nombre}</td>
                    <td>{$evento->fecha}</td>
                    <td>{$evento->organizador}</td>
                    <td><a href="eventos?filter={$evento->ciudad}">{$evento->ciudad}</a></td>
										<td>
												<form action="eventos/detalles/{$evento->id_evento}"><button value="{$evento->id_evento}" type="submit">Ver</button></form>
										</td>
                    {if isset($userName)}
											<td>
												<form action="eventos/borrar/{$evento->id_evento}"><button type="submit">Borrar</button></form>
											</td>
											<td>
												<form action="eventos/formeditar/{$evento->id_evento}"><button type="submit">Editar</button></form>
											</td>
                    {/if}
                  </tr>
          {/foreach}
        </tbody>
        </table>
        {if isset($userName)}
          <form action="eventos/insertar" method="post" enctype="multipart/form-data">
              <input type="text" id="nombre" name="nombre" placeholder="Nombre">
              <input type="text" id="fecha" name="fecha" placeholder="Fecha">
              <input type="text" id="organizador" name="organizador" placeholder="Organizador">
              <select type="text" id="ciudad" name="ciudad" placeholder="Ciudad">
                {foreach from=$lista_ciudades item=ciudad}
                  <option value="{$ciudad->id_ciudad}">{$ciudad->nombre}</option>
                {/foreach}
              </select>
              <input type="file" id="imagen" name="imagen" placeholder="Imagen">
              <button type="submit" id="btnEnviar">Insertar</button>
          </form>
        {/if}

{include file="footer.tpl"}