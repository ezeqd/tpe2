<!DOCTYPE html>
            <html class="no-js"lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <base href='{$BASE_URL}' >
                <title>{$titulo}</title>
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
            </head>
            <header>
              <div class="logo"></div>
                {if isset($userName)}
                    <h1>Hola {$userName}</h1>
                    <div data-id="id_usuario"
                    <div><form action="logout" method="POST" class="log-in-form"><input type="submit" class="button expanded" value="Log out"></input></form></div>
                {else}
                    <h1>Hola Invitado</h1>
                    <div><form action="login" method="POST" class="log-in-form"><input type="submit" class="button expanded" value="Log in"></input></form></div>
                    <div><form action="register" method="POST" class="log-in-form"><input type="submit" class="button expanded" value="Register"></input></form></div>
                {/if}
                {if isset($error)}
                    <div>{$error}</div>
                {/if}
                <nav>
                    <ul><a href="{BASE_URL}eventos">Eventos</a></ul>
                    <ul><a href="{BASE_URL}ciudades">Ciudades</a></ul>
                    <ul><a href="{BASE_URL}usuarios">Usuarios</a></ul>
                </nav>
            </header>
            <body>
            <h1>{$titulo}</h1>
