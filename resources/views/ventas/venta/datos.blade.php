			<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>		
						<th>Codigo</th>					
						<th>Fecha</th>
						<th>CLiente</th>
						<th>Comprobante</th>
						<th>Impuesto</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($ventas as $vent)
					<tr>
						<td>{{$vent->id_vent_pro}}</td>						
						<td>
							{{$vent->fech_vent}}
						</td>
						<td>
							{{$vent->nom_per}}
						</td>
						<td>
							{{$vent->tip_comp_vent.': '.$vent->ser_comp_vent.'-'.$vent->num_comp_vent}}
						</td>						
						<td>
							{{$vent->imp_vent}}
						</td>
						<td>
							{{$vent->total_vent}}
						</td>
						<td>
							{{$vent->est_vent}}
						</td>						
						<td>
							<a href="{{URL::action('VentaController@show',$vent->id_vent_pro)}}"><button type="button" class="btn btn-primary">Detalles</button></a>
							<a href="" data-target="#modal-delete-{{$vent->id_vent_pro}}" data-toggle="modal"><button type="button" class="btn btn-danger">Anular</button></a>
						</td>
					</tr>
					@include('ventas.venta.modal')
				@endforeach	
				</tbody>
			</table>
		</div>
		{{$ventas->render()}}