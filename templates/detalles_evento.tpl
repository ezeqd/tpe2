{include file="header.tpl"}
    <table>
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Organizador</th>
            <th scope="col">Ciudad</th>
            {if isset($userName)}
              <th scope="col">Borrar</th>
              <th scope="col">Editar</th>
            {/if}
          </tr>
        </thead>
          <tbody>
               <tr>
                 <td id="nombre{$evento->id_evento}" class="animated fadeIn">{$evento->nombre}</td>
                 <td id="fecha{$evento->id_evento}"class="animated fadeIn">{$evento->fecha}</td>
                 <td id="organizador{$evento->id_evento}"class="animated fadeIn">{$evento->organizador}</td>
                 <td id="ciudad{$evento->id_evento}" class="animated fadeIn"><a href="eventos?filter={$evento->ciudad}">{$evento->ciudad}</a></td>
                 {if isset($userName)}
                   <td class="animated fadeIn">
                     <form action="eventos/borrar/{$evento->id_evento}"><button type="submit">Borrar</button></form>
                   </td>
                   <td class="animated fadeIn">
                     <form action="eventos/formeditar/{$evento->id_evento}"><button value="{$evento->id_evento}" type="submit">Editar</button></form>
                   </td>
                 {/if}
               </tr>
        </tbody>
        </table>
        {if isset($imagenes)}
          {foreach from=$imagenes item=imagen}
            <div>
              <img src="{$imagen->url_imagen}"/>
              <form action="imagenes/borrar/{$imagen->id_imagen}" method="POST" ><input type="hidden" name="id" value="{$evento->id_evento}"><button type="submit">Borrar</button></form>
            </div>
          {/foreach}
        {/if}
        {if isset($userName)}
          <form action="imagenes/insertar" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="{$evento->id_evento}">
          <input type="file" id="imagen" name="imagen" placeholder="Imagen">
              <button type="submit" id="btnEnviar">Insertar</button>
          </form>
        {/if}
        {literal}
          <div id="app">

          </div>
        {/literal}
        <script src="assets/js/vue.js"></script>
	</body>
