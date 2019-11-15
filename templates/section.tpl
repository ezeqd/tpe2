<section id="eventos">
    <ul class="eventos-list">

    </ul>
</section>

<form action="eventos/insertar" method="post">
    <input type="text" id="nombre" name="nombre" placeholder="Nombre">
    <input type="text" id="fecha" name="fecha" placeholder="Fecha">
    <input type="text" id="organizador" name="organizador" placeholder="Organizador">
    <select type="text" id="ciudad" name="ciudad" placeholder="Ciudad">
      {foreach from=$lista_ciudades item=ciudad}
        <option value="{$ciudad->id_ciudad}">{$ciudad->nombre}</option>
      {/foreach}
    </select>
    <button type="submit" id="btnEnviar">Insertar</button>
</form>
<script src="assets/js/comments.js"></script>
