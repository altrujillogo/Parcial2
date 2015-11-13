<div calss="square">
	<table border ="0" width="100%" cellpadding ="10" cellspacing="10">
		
		
		<tr>

			


		</tr>

		{section loop=$parques name=i} 

		<tr>
			<td>	
				<b>Codigo:</b> {$parques[i]->get('codigo')}<br />

				<b>nombre:</b> {$parques[i]->get('nombre')}<br />
				<b>municipio:</b> {$parques[i]->get('municipio')}<br />
				


			</td>



		</tr>
		{/section}	

	</table>




</div>


