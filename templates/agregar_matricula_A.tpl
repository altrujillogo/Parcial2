<div class="square">
<h1 class="title">Agregar Matricula</h1>
<form action="{$gvar.l_global}agregar_matricula_A.php?option=insert" method="post">
	<label for="id">Identificacion: </label><input id="id" name="id" type="text"/><br/>
	<label for="nota">Nota: </label>
	<input id="nota" name="nota" type="float"  /><br/>
	<label for="curso">Curso: </label>
	<select name="curso">
		{section loop=$cursos name=i}
			<option value = {$cursos[i]->get('id')}> {$cursos[i]->get('nombre')} </option>
		{/section}
		
	</select><br/>
	<label for="estudiante">Estudiante: </label>
	<select name="estudiante">
		{section loop=$estudiantes name=i}
			<option value = {$estudiantes[i]->get('id')}> {$estudiantes[i]->get('nombre')} </option>
		{/section}
		
	</select><br/>
	<input class="btn btn-primary" type="submit" value="Agregar"/>

</form>
</div>