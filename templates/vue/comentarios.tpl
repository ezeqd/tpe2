
{literal}
  <div id="app">
      <ul>
       <li v-for="comentario in comentarios">
           {{ comentario.usuario }} - {{ comentario.comentario }} - {{comentario.puntaje}}
           <a :id="comentario.id_comentario" class="botonBorrar" href="#">eliminar</a>
       </li>
    </ul>
  </div>
{/literal}
