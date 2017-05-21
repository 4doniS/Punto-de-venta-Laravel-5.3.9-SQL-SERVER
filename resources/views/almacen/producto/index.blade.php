@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<h3>Listado de Productos <a href="producto/create">
		<button type="button" class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.producto.search')	
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
						<th>Código</th>
						<th>Categoria</th>
						<th>Stock</th>
						<th>Imagen</th>
						<th>Estado</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($productos as $pro)
					<tr>
						<td>
							{{$pro->id_pro}}
						</td>
						<td>
							{{$pro->nom_pro}}
						</td>
						<td>
							{{$pro->cod_pro}}
						</td>
						<td>
							{{$pro->categoria}}
						</td>
						<td>
							{{$pro->stock_pro}}
						</td>
						<td>
							<img src="{{asset('imagenes/productos/'.$pro->img_pro)}}" alt="{{$pro->nom_pro}}" height="50px" width="100px" class="img.thumbnail">
						</td>
						<td>
							{{$pro->est_pro}}
						</td>
						<td>
							<a href="{{URL::action('ProductoController@edit',$pro->id_pro)}}"><button type="button" class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pro->id_pro}}" data-toggle="modal"><button type="button" class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('almacen.producto.modal')
				@endforeach	
				</tbody>
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>

@endsection
