{include file="header.tpl"}
<script type="text/javascript" src="js/scripts.js"></script>
        <table>
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Fecha</th>
              <th scope="col">Organizador</th>
              <th scope="col">Ciudad</th>
            </tr>
          </thead>
          <tbody>
          {foreach from=$lista_eventos item=evento}
                  <tr>
                    <td id="nombre{$evento->id_evento}" class="animated fadeIn">{$evento->nombre}</td>
                    <td id="fecha{$evento->id_evento}"class="animated fadeIn">{$evento->fecha}</td>
                    <td id="organizador{$evento->id_evento}"class="animated fadeIn">{$evento->organizador}</td>
                    <td id="ciudad{$evento->id_evento}" data-id="{$evento->id_ciudad}" class="animated fadeIn">{$evento->ciudad}</td>
                    <td class="animated fadeIn">
                      <form action="eventos/borrar/{$evento->id_evento}"><button type="submit">Borrar</form>
                    </td>
                    <td class="animated fadeIn">
                      <button class="botonEditar" value="{$evento->id_evento}" type="submit">Editar</form>
                    </td>
                  </tr>
          {/foreach}
        </tbody>
        </table>

        <form id="FormUnico" action="eventos/insertar" method="post">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
            <input type="text" id="fecha" name="fecha" placeholder="Fecha">
            <input type="text" id="organizador" name="organizador" placeholder="Organizador">
            <select type="text" id="ciudad" name="ciudad" placeholder="Ciudad">
              {foreach from=$lista_ciudades item=ciudad}
                <option value="{$ciudad->id_ciudad}">{$ciudad->nombre}</option>
              {/foreach}
            </select>
            <button type="submit" id="btnEnviar">Insertar</button>
        </form>
{include file="footer.tpl"}