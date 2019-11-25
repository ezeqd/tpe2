
{literal}
  <div id="app">
  <table class="table">
          <thead>
            <tr>
              <th>Fecha <a href="" v-on:click.prevent="get('fecha','ASC')">▲</a><a href="" v-on:click.prevent="get('fecha','DESC')">▼</a></th>
              <th>Usuario<a href="" v-on:click.prevent="get('usuario','ASC')">▲</a><a href="" v-on:click.prevent="get('usuario','DESC')">▼</a></th>
              <th>Comentario<a href="" v-on:click.prevent="get('comentario','ASC')">▲</a><a href="" v-on:click.prevent="get('comentario','DESC')">▼</a></th>
              <th>Puntaje<a href="" v-on:click.prevent="get('puntaje','ASC')">▲</a><a href="" v-on:click.prevent="get('puntaje','DESC')">▼</a></th>
              <th v-if="admin==1" scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
           <tr v-for="comentario in comentarios">
              <td>{{ comentario.fecha }}</td>
              <td>{{ comentario.usuario }}</td>
              <td>{{ comentario.comentario }}</td>
              <td>{{ comentario.puntaje }}</td>
              <td v-if="admin==1"><button  v-on:click="borrar(comentario.id_comentario)" :id="comentario.id_comentario" class="botonBorrar" href="#">eliminar</button></td>
          </tbody>
    </table>

    <p class="lead">Promedio de Puntuación: {{promedio}}</p>
    
    <form v-if="login==1">
      <input type="hidden" id="usuario" value="{userName}">
      <label> Comentario:
        <input type="text" id="comentario" placeholder="Comentario">
      </label>
      <label> Puntaje:
        <select type="checkbox" id="puntaje" placeholder="Puntaje">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </label>
      <button v-on:click="insertar" id="botonEnviar">Enviar</button>
    </form>
  </div>
{/literal}
