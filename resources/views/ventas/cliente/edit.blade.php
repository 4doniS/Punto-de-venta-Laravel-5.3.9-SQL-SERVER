@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h3>Editar CLiente:  {{ $cliente->nom_per}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">			
			@foreach ($errors->all() as $error)
				<strong> {{$error}} </strong>
			@endforeach			
		</div>
		@endif
	</div>
</div>
		{!!Form::model($cliente,['method'=>'PATCH','route'=>['ventas.cliente.update',$cliente->id_per]])!!}
		{{Form::token()}}
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="nombre">Nombre</label>
				<input type="text" name="txtNombre"  value="{{$cliente->nom_per}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="direccion">Direccion</label>
				<input type="text" name="txtDirPer"  value="{{$cliente->dir_per}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="tipdoc">Tipo Doc.</label>
				<select name="cboTipDoc"  class="form-control" >
				@if($cliente->tip_doc_per == 'DNI')
					<option value="DNI" selected="TRUE">DNI</option>
					<option value="RUC">RUC</option>		
					<option value="PAS">PAS</option>
				@elseif($cliente->tip_doc_per == 'RUC')
					<option value="DNI">DNI</option>
					<option value="RUC"  selected="TRUE">RUC</option>		
					<option value="PAS">PAS</option>
				@else
					<option value="DNI">DNI</option>
					<option value="RUC">RUC</option>		
					<option value="PAS" selected="TRUE">PAS</option>				
				@endif							
				</select>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="numdoc">Número Documento</label>
				<input type="text" name="txtNumDoc"  value="{{$cliente->num_doc_per}}" class="form-control">
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
				<label form="telefono">Telefono</label>
				<input type="text" name="txtTel"  value="{{$cliente->tel_per}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			<label form="email">Email</label>
			<input type="text" name="txtEmail"  value="{{$cliente->email_per}}" class="form-control">
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