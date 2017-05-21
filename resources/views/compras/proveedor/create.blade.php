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
	
		{!!Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
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
				<label form="direccion">Direccion</label>
				<input type="text" name="txtDirPer" required value="{{old('txtDirPer')}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="tipdoc">Tipo Doc.</label>
				<select name="cboTipDoc"  class="form-control" >
					<option value="DNI">DNI</option>
					<option value="RUC">RUC</option>		
					<option value="PAS">PAS</option>							
				</select>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="numdoc">Número Documento</label>
				<input type="text" name="txtNumDoc"  value="{{old('txtNumDoc')}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="telefono">Telefono</label>
				<input type="text" name="txtTel"  value="{{old('txtTel')}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			<label form="email">Email</label>
			<input type="text" name="txtEmail" required value="{{old('txtEmail')}}" class="form-control">
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