
{literal}
  <div id="app">
  Promedio de Puntuación: {{promedio}}
      <ul>
       <li v-for="comentario in comentarios">
          {{ comentario.usuario }} - {{ comentario.comentario }} - {{comentario.puntaje}}
          
            <button v-if="admin==1" v-on:click="borrar(comentario.id_comentario)" :id="comentario.id_comentario" class="botonBorrar" href="#">eliminar</a>
          
       </li>
    </ul>
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
