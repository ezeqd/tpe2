{include file="header.tpl"}

<form action="iniciarsesion" method="POST" class="log-in-form">
  <h4 class="text-center">Register with you email account</h4>
  <label>Email
    <input name="usuario" type="usuario" placeholder="somebody@example.com">
  </label>
  <label>Password
    <input name="password" type="password" placeholder="Password">
  </label>
  <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
  <p><input type="submit" class="button expanded" value="Log in"></p>
  <p class="text-center"><a href="#">Forgot your password?</a></p>
</form>

{if $error}
<div>{$error}</div>
{/if}
{include file="footer.tpl"}