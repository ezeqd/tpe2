<!DOCTYPE html>
            <html class="no-js"lang="en">
            <head>
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
                    <div><form action="logout" method="POST" class="log-in-form"><input type="submit" class="button expanded" value="Log out"></input></form></div>
                {else}
                    <div><form action="login" method="POST" class="log-in-form"><input type="submit" class="button expanded" value="Log in"></input></form></div>
                    <div><form action="register" method="POST" class="log-in-form"><input type="submit" class="button expanded" value="Register"></input></form></div>
                {/if}
            </header>
            <body>
            <h1>{$titulo}</h1>
