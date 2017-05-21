@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<h3>Listado de Ingresos <a href="ingreso/create">
		<button type="button" class="btn btn-success">Nuevo</button></a></h3>
		@include('compras.ingreso.search')	
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>						
						<th>Fecha</th>
						<th>Proveedor</th>
						<th>Comprobante</th>
						<th>Impuesto</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($ingresos as $ing)
					<tr>						
						<td>
							{{$ing->fech_ing}}
						</td>
						<td>
							{{$ing->nom_per}}
						</td>
						<td>
							{{$ing->tip_comp_ing.': '.$ing->ser_comp_ing.'-'.$ing->numero_comp_ing}}
						</td>						
						<td>
							{{$ing->imp_ing}}
						</td>
						<td>
							{{$ing->total}}
						</td>
						<td>
							{{$ing->est_ing}}
						</td>						
						<td>
							<a href="{{URL::action('IngresoController@show',$ing->id_ing)}}"><button type="button" class="btn btn-primary">Detalles</button></a>
							<a href="" data-target="#modal-delete-{{$ing->id_ing}}" data-toggle="modal"><button type="button" class="btn btn-danger">Anular</button></a>
						</td>
					</tr>
					@include('compras.ingreso.modal')
				@endforeach	
				</tbody>
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection
