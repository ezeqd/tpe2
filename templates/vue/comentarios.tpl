
{literal}
  <div id="app">
  Promedio de Puntuación: {{promedio}}
  <table>
          <thead>
            <tr>
              <th>Fecha <a :href=baseurl+"?atributo=fecha&orden=asc">▲</a><a :href=baseurl+"?atributo=fecha&orden=desc">▼</a></th>
              <th>Usuario<a :href=baseurl+"?atributo=usuario&orden=asc">▲</a><a :href=baseurl+"?atributo=usuario&orden=desc">▼</a></th>
              <th>Comentario<a :href=baseurl+"?atributo=comentario&orden=asc">▲</a><a :href=baseurl+"?atributo=comentario&orden=desc">▼</a></th>
              <th>Puntaje<a :href=baseurl+"?atributo=puntaje&orden=asc">▲</a><a :href=baseurl+"?atributo=puntaje&orden=desc">▼</a></th>
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
    <form>
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
