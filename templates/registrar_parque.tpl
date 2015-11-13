<div class="square">
<h1 class="title">Agregar Parque</h1>
<form action="{$gvar.l_global}registrar_parque.php?option=insert" method="post">
	<label for="codigo">Codigo: </label>
	<input id="codigo" name="codigo" type="text"/><br/>
	<label for="nombre">Nombre: </label>
	<input id="nombre" name="nombre" type="text"  /><br/>
	<label for="curso">Curso: </label>

	<label for="nivel">Nivel: </label>
	<select name="municipio">
		
			<option value = "medellin"> medellin </option>
			<option value = "rionegro"> rionegro </option>
			<option value = "la estrella"> la estrella </option>
			<option value = "copacabana"> copacabana </option>
			<option value = "guatape"> guatape </option>
		
	</select><br/>
	<select name="nivel">
		
			<option value = "alto"> Alto </option>
			<option value = "bajo"> Bajo </option>
		
	</select><br/>
	<input class="btn btn-primary" type="submit" value="Agregar"/>

</form>
</div>