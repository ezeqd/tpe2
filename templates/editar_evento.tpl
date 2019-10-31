{include file="header.tpl"}
        {if isset($userName)}
          <form id="FormUnico" action="eventos/editar/{$evento->id_evento}" method="post">
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="{$evento->nombre}">
              <input type="text" id="fecha" name="fecha" placeholder="Fecha" value="{$evento->fecha}">
              <input type="text" id="organizador" name="organizador" placeholder="Organizador" value="{$evento->organizador}">
              <select type="text" id="ciudad" name="ciudad" placeholder="Ciudad">
                {foreach from=$lista_ciudades item=ciudad}
                  {if $evento->id_ciudad==$ciudad->id_ciudad}
                    <option selected value="{$ciudad->id_ciudad}">{$ciudad->nombre}</option>
                  {else}
                    <option value="{$ciudad->id_ciudad}">{$ciudad->nombre}</option>
                  {/if}
                {/foreach}
              </select>
              <button type="submit">Guardar</button>
          </form>
        {/if}
        <a href='{$BASE_URL}' >Volver al Inicio</a>
{include file="footer.tpl"}