{include file="header.tpl"}
    <table class="table">
        <thead class="thead-dark">
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
               <tr id="data" data-idEvento="{$evento->id_evento}" data-idUsuario="{if isset ($usuario)}{$usuario->id_usuario}{/if}" data-admin="{if isset ($usuario)}{$usuario->admin}{/if}">
                 <td>{$evento->nombre}</td>
                 <td>{$evento->fecha}</td>
                 <td>{$evento->organizador}</td>
                 <td><a href="eventos?filter={$evento->ciudad}">{$evento->ciudad}</a></td>
                 {if isset($userName)}
                   <td>
                     <form action="eventos/borrar/{$evento->id_evento}"><button type="submit">Borrar</button></form>
                   </td>
                   <td>
                     <form action="eventos/formeditar/{$evento->id_evento}"><button value="{$evento->id_evento}" type="submit">Editar</button></form>
                   </td>
                 {/if}
               </tr>
        </tbody>
        </table>
        {if isset($imagenes)}
          {foreach from=$imagenes item=imagen}
            <picture>
              <img class="img-thumbnail" src="{$imagen->url_imagen}"/>
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
        {include file="vue/comentarios.tpl"}
    <script src="assets/js/vue.js"></script>
	</body>
