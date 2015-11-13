<div calss="square">
	
<form action="{$gvar.l_global}calificar_parque.php?option=calificar" method="post">

	<label for="parque">Seleccione el parque </label>
	
	
	<select name="parque">
		{section loop=$parques name=i}
			<option value = {$parques[i]->get('codigo')}> {$parques[i]->get('nombre')} </option>
		{/section}
		
	</select><br/>
	<label for="valor">Calificacion:</label>
	<input id="valor" name="valor" type="float"/><br/>
	<input class="btn btn-primary" type="submit" value="Calificar"/>
</form>
			





</div>


