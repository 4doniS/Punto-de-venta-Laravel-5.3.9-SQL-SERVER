@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<h3>Listado de Clientes <a href="cliente/create">
		<button type="button" class="btn btn-success">Nuevo</button></a></h3>
		@include('ventas.cliente.search')	
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Tipo Doc.</th>
						<th>Numero Doc.</th>
						<th>Dirección</th>
						<th>Telefono</th>
						<th>Email</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($clientes as $cli)
					<tr>
						<td>
							{{$cli->id_per}}
						</td>
						<td>
							{{$cli->nom_per}}
						</td>
						<td>
							{{$cli->tip_doc_per}}
						</td>
						<td>
							{{$cli->num_doc_per}}
						</td>
						<td>
							{{$cli->dir_per}}
						</td>
						<td>
							{{$cli->tel_per}}
						</td>
						<td>
							{{$cli->email_per}}
						</td>
						<td>
							<a href="{{URL::action('ClienteController@edit',$cli->id_per)}}"><button type="button" class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$cli->id_per}}" data-toggle="modal"><button type="button" class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('ventas.cliente.modal')
				@endforeach	
				</tbody>
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection
