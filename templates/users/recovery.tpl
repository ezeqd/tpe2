{include file="header.tpl"}

<form action="newrecovery" method="POST" class="log-in-form">
  <h4 class="text-center">Ingrese su nombre de usuario o email y se le enviara un enlace a la brevedad</h4  >
  <label>Email
    <input name="lost-user" type="usuario" placeholder="somebody@example.com">
    <button type="submit">Enviar</button>
  </label>
</form>
{if $error}
<div>{$error}</div>
{/if}
{include file="footer.tpl"}