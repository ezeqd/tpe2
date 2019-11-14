{if isset($error)}
	{if $error == 1}
		<div>Usted no tiene permisos de administración</div>
	{/if}
	{if $error == 2}
		<div>Error de inicio de sesión. No existe el usuario ingresado</div>
	{/if}

	{if $error == 3}
		<div>Error de inicio de sesión. La contraseña es incorrecta</div>
	{/if}

	{if $error == 4}
		<div>Usted nos es admin y se tiene que arrepentir</div>
	{/if}
{/if}