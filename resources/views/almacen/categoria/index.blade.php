@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<h3>Listado de Categorias <a href="categoria/create"><button type="button" class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.categoria.search')
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
						<th>Descripcion</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($categorias as $cat)
					<tr>
						<td>
							{{$cat->id_cat_pro}}
						</td>
						<td>
							{{$cat->nom_cat_pro}}
						</td>
						<td>
							{{$cat->desc_cat_pro}}
						</td>
						<td>
							<a href="{{URL::action('CategoriaController@edit',$cat->id_cat_pro)}}"><button type="button" class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$cat->id_cat_pro}}" data-toggle="modal"><button type="button" class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('almacen.categoria.modal')
				@endforeach	
				</tbody>
			</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>

@endsection
