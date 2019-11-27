{include file="header.tpl"}

<form action="setpass" method="POST" class="log-in-form">
  <h4 class="text-center">Ingrese nueva contraseña</h4  >
  <label>Nueva contraseña
    <input name="newpass1" type="usuario" placeholder="somebody@example.com">
    <input name="newpass2" type="usuario" placeholder="somebody@example.com">
    <button type="submit">Enviar</button>
  </label>
</form>
{if $error}
<div>{$error}</div>
{/if}
{include file="footer.tpl"}