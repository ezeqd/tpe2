{include file="header.tpl"}
    <table>
        <thead>
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
               <tr>
                 <td id="nombre{$evento->id_evento}" class="animated fadeIn">{$evento->nombre}</td>
                 <td id="fecha{$evento->id_evento}"class="animated fadeIn">{$evento->fecha}</td>
                 <td id="organizador{$evento->id_evento}"class="animated fadeIn">{$evento->organizador}</td>
                 <td id="ciudad{$evento->id_evento}" class="animated fadeIn"><a href="eventos?filter={$evento->ciudad}">{$evento->ciudad}</a></td>
								<td class="animated fadeIn">
									<form action="eventos/detalles/{$evento->id_evento}"><button value="{$evento->id_evento}" type="submit">Ver</button></form>
								</td>
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
        {include file="section.tpl"}
        {include file="footer.tpl"}