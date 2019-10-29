{include file="header.tpl"}
        {if isset($userName)}
        {foreach from=$evento item=e}
          <form id="FormUnico" action="eventos/editar/{$id}" method="post">
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="{$e->nombre}">
              <input type="text" id="fecha" name="fecha" placeholder="Fecha" value="{$e->fecha}">
              <input type="text" id="organizador" name="organizador" placeholder="Organizador" value="{$e->organizador}">
              <select type="text" id="ciudad" name="ciudad" placeholder="Ciudad" value="{$e->id_ciudad}">
                {foreach from=$lista_ciudades item=ciudad}
                  {if $e->id_ciudad==$ciudad->id_ciudad}
                    <option selected value="{$ciudad->id_ciudad}">{$ciudad->nombre}</option>
                  {else}
                    <option value="{$ciudad->id_ciudad}">{$ciudad->nombre}</option>
                  {/if}
                {/foreach}
              </select>
              <button type="submit" id="btnEnviar">Guardar</button>
          </form>
          {/foreach}
        {/if}
        
{include file="footer.tpl"}