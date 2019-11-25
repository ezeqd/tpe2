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
                {else}
                    <h1>Hola Invitado</h1>
                {/if}
                {if isset($error)}
                    <div>{$error}</div>
                {/if}
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="{BASE_URL}eventos">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}ciudades">Ciudades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}usuarios">Usuarios</a>
                        </li>
                {if isset($userName)}
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}logout">Logout</a>
                        </li>
                {else}
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}register">Registrar</a>
                        </li>
                    </ul>
                {/if}
                
            </header>
            <body>
            <h1>{$titulo}</h1>
