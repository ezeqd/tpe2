{include file="header.tpl"}

<form action="setpass" method="POST" class="log-in-form">
  <input type="hidden" name="hash" value="{$hash}">
  <h4 class="text-center">Ingrese nueva contraseña</h4>
  <p>Nueva contraseña:
    <input name="newpass1" type="password" placeholder="Password">
  </p>
  <p>Repita la constraseña:
    <input name="newpass2" type="password" placeholder="Password">
  </p>
    <button type="submit">Enviar</button>
</form>
{if $error}
<div>{$error}</div>
{/if}
{include file="footer.tpl"}