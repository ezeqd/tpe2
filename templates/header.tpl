<!DOCTYPE html>
            <html class="no-js"lang="en">
            <head>
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <base href='{$BASE_URL}' >
                <title>{$titulo}</title>
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
