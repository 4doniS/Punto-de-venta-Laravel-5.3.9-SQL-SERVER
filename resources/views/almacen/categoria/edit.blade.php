@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h3>Editar Categoria:  {{ $categoria->nom_cat_pro}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">			
			@foreach ($errors->all() as $error)
				<strong> {{$error}} </strong>
			@endforeach			
		</div>
		@endif
		{!!Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->id_cat_pro]])!!}
		{{Form::token()}}
			<div class="form-group">
				<label form="nombre">Nombre</label>
				<input type="text" name="txtNombre" class="form-control" value="{{$categoria->nom_cat_pro}}">
			</div>
			<div class="form-group">
				<label form="descripcion">Descripción</label>
				<input type="text" name="txtDesc" class="form-control" value="{{$categoria->desc_cat_pro}}">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection