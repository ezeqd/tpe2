{include file="header.tpl"}
        {if isset($userName)}
          <form action="ciudades/editar/{$ciudad->id_ciudad}" method="post">
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="{$ciudad->nombre}">
              <input type="text" id="capacidad" name="capacidad" placeholder="Capacidad" value="{$ciudad->capacidad}">
              <button type="submit">Guardar</button>
          </form>
        {/if}
        <a href='{$BASE_URL}'>Volver al Inicio</a>
{include file="footer.tpl"}