@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h3>Editar Producto:  {{ $producto->nom_pro}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">			
			@foreach ($errors->all() as $error)
				<strong> {{$error}} </strong>
			@endforeach			
		</div>
		@endif
	</div>
</div>
		{!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id_pro],'files'=>'true'])!!}
		{{Form::token()}}
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="nombre">Nombre</label>
				<input type="text" name="txtNombre" required value="{{$producto->nom_pro}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="Categorias">Categorias</label>
				<select name="cboCodCate"  class="form-control" required="required">
					@foreach($categorias as $cat)
						@if($cat->id_cat_pro==$producto->id_cat_pro)
						<option value="{{$cat->id_cat_pro}}" selected="true">{{$cat->nom_cat_pro}}</option>
						@else
						<option value="{{$cat->id_cat_pro}}" >{{$cat->nom_cat_pro}}</option>
						@endif
					@endforeach
				</select>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="Codigo">Código</label>
				<input type="text" name="txtCod" required value="{{$producto->cod_pro}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="Stock">Stock</label>
				<input type="text" name="txtStock" required value="{{$producto->stock_pro}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			<label form="Descripcion">Descripción</label>
			<textarea  name="txtDesc" class="form-control" rows="3"  >{{$producto->desc_pro}}</textarea>			
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			<label form="Imagen">Imagen</label>
			<input type="file" name="img"   class="form-control">
			@if(($producto->img_pro) != "")
				<img src="{{asset('imagenes/productos/'.$producto->img_pro)}}" class="img-responsive" alt="Image" width="100px" height="100px">
			@endif
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