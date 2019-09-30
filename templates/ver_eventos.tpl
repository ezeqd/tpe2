{include file="header.tpl"}
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
                    <td class="animated fadeIn">{$evento->nombre}</td>
                    <td class="animated fadeIn">{$evento->fecha}</td>
                    <td class="animated fadeIn">{$evento->organizador}</td>
                    <td class="animated fadeIn">{$evento->ciudad}</td>
                  </tr>
          {/foreach}
        </tbody>
        </table>

        <form action="evento/insertar" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="fecha" placeholder="Fecha">
            <input type="text" name="organizador" placeholder="Organizador">
            <input type="text" name="ciudad" placeholder="Ciudad">
            <input type="submit" value="Insertar">
        </form>
{include file="footer.tpl"}
