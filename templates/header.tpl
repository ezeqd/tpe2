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
                <div  class="d-flex bd-highlight mb-e">
                    <ul class="nav justify-content-start p-2 bd-highlight>
                        <li class="nav-item">
                            <a class="nav-link active" href="{BASE_URL}eventos">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}ciudades">Ciudades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}usuarios">Usuarios</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end ml-auto p-2 bd-highlight>
                {if isset($userName)}
                        <li class="nav-item">
                            <span class="nav-link">Hola {$userName}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}logout">Logout</a>
                        </li>
                {else}
                        <li class="nav-item">
                            <span class="nav-link">Hola Invitado</span>
                        <li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}register">Registrar</a>
                        </li>
                {/if}
                    </ul>
                </div>
                {if isset($error)}
                    <div>{$error}</div>
                {/if}
            </header>
            <body>
            <h1 class="p-3 mb-2 bg-primary text-white">{$titulo}</h1>
