{include file="header.tpl"}
        <table>
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Email</th>
              <th scope="col">Administrador</th>
              {if $user->admin}
              <th scope="col">Dar/Quitar Permisos de Admin</th>
                <th scope="col">Borrar</th>
              {/if}
            </tr>
          </thead>
          <tbody>
          {foreach from=$lista_usuarios item=usuario}
                  <tr>
                    <td class="animated fadeIn">{$usuario->id_usuario}</td>
                    <td class="animated fadeIn">{$usuario->email}</td>
                    <td class="animated fadeIn">{if $usuario->admin==1}Sí{else}No{/if}</td>
                    {if $user->admin}
                    <td class="animated fadeIn">
												<form action="usuarios/admin/{$usuario->id_usuario}"><button type="submit">Cambiar</button></form>
										</td>
											<td class="animated fadeIn">
												<form action="usuarios/borrar/{$usuario->id_usuario}"><button type="submit">Borrar</button></form>
											</td>
                    {/if}
                  </tr>
          {/foreach}
        </tbody>
        </table>
{include file="footer.tpl"}