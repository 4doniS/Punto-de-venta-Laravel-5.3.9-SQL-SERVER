@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h3>Nuevo Prodcuto</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<strong> {{$error}} </strong>
			@endforeach	
		</div>
		@endif
	</div>
</div>
	
		{!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
		{{Form::token()}}
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="nombre">Nombre</label>
				<input type="text" name="txtNombre" required value="{{old('txtNombre')}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="Categorias">Categorias</label>
				<select name="cboCodCate"  class="form-control" required="required">
					@foreach($categorias as $cat)
					<option value="{{$cat->id_cat_pro}}">{{$cat->nom_cat_pro}}</option>
					@endforeach
				</select>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="Codigo">Código</label>
				<input type="text" name="txtCod" required value="{{old('txtCod')}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="Stock">Stock</label>
				<input type="text" name="txtStock" required value="{{old('txtStock')}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			<label form="Descripcion">Descripción</label>
			<textarea  name="txtDesc" class="form-control" rows="3" ></textarea>			
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			<label form="Imagen">Imagen</label>
			<input type="file" name="img"   class="form-control">
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
		</div>	
	</div>			
</div>			
		{!!Form::close()!!}
	
@endsection