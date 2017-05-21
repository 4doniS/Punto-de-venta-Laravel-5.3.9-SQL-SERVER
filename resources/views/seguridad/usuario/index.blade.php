@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<h3>Listado de Usuarios <a href="usuario/create"><button type="button" class="btn btn-success">Nuevo</button></a></h3>
		@include('seguridad.usuario.search')
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
						<th>Email</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usu)
					<tr>
						<td>
							{{$usu->id}}
						</td>
						<td>
							{{$usu->name}}
						</td>
						<td>
							{{$usu->email}}
						</td>						
						<td>
							<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button type="button" class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button type="button" class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('seguridad.usuario.modal')
				@endforeach	
				</tbody>
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection
