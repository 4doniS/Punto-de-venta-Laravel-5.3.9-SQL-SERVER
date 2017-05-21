@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<h3>Listado de Proveedores <a href="proveedor/create">
		<button type="button" class="btn btn-success">Nuevo</button></a></h3>
		@include('compras.proveedor.search')	
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
				@foreach($proveedores as $pro)
					<tr>
						<td>
							{{$pro->id_per}}
						</td>
						<td>
							{{$pro->nom_per}}
						</td>
						<td>
							{{$pro->tip_doc_per}}
						</td>
						<td>
							{{$pro->num_doc_per}}
						</td>
						<td>
							{{$pro->dir_per}}
						</td>
						<td>
							{{$pro->tel_per}}
						</td>
						<td>
							{{$pro->email_per}}
						</td>
						<td>
							<a href="{{URL::action('ProveedorController@edit',$pro->id_per)}}"><button type="button" class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pro->id_per}}" data-toggle="modal"><button type="button" class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('compras.proveedor.modal')
				@endforeach	
				</tbody>
			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>

@endsection
