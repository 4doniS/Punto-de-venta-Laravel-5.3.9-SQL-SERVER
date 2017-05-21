@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h3>Nuevo Ingreso</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<strong> {{$error}} </strong>
			@endforeach	
		</div>
		@endif
	</div>
</div>
	
		{!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			<label form="nombre">Proveedor</label>
			<select name="CboPro" id="id_prob" class="form-control selectpicker" data-live-search="true" >				
				@foreach($proveedor as $pro)
					<option value="{{$pro->id_per}}">{{$pro->nom_per}}</option>
				@endforeach
			</select>
		</div>	
	</div>	
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="tipocomprobante">Tipo Comprobante</label>
				<select name="CboTipCom"  class="form-control" >
					<option value="Boleta">Boleta</option>
					<option value="Factura">Factura</option>		
					<option value="Ticket">Ticket</option>							
				</select>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="seriecomprobante">Serie</label>
				<input type="text" name="txtSerCom"  value="{{old('txtSerCom')}}" class="form-control">
		</div>	
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="numerocomprobante">Numero</label>
				<input type="text" name="txtNumCom"  value="{{old('txtNumCom')}}" required="true" class="form-control">
		</div>	
	</div>
		
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">		
			<div class="panel-body">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<label >Producto</label>
					<select name="CboProP" id="CboProP" class="form-control selectpicker" data-live-search="true">
						@foreach($productos as $pro)
						<option value="{{$pro->id_pro}}">{{$pro->producto}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<div class="form-group">
						<label form="cantidad">Cantidad</label>
						<input type="number" name="txtCantP"   id="txtCantP"  class="form-control">
					</div>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<div class="form-group">
						<label form="preciocompra">Precio de Compra</label>
						<input type="number" name="txtPreComP"   id="txtPreComP"  class="form-control">
					</div>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<div class="form-group">
						<label form="precioventa">Precio de Venta</label>
						<input type="number" name="txtPreVenP"   id="txtPreVenP"  class="form-control">
					</div>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<div class="form-group">						
						<button type="button" class="btn btn-primary" id="btn_agr">Agregar</button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="tblDetalle">
						<thead>
							<tr>
								<th>Opciones</th>
								<th>Artículo</th>
								<th>Cantidad</th>
								<th>Precio Compra</th>
								<th>Precio venta</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tfoot>
							<th><h4>TOTAL</h4></th4>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total">S/. 0.00</h4></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>

			</div>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="guardar">
		<div class="form-group">
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
		</div>	
	</div>			
</div>			
		{!!Form::close()!!}
@push ('scripts')
<script>
$(document).ready(function() {
	$("#btn_agr").click(function() {
		agregar();
	});
});


var cont=0;
total = 0;
subtotal=[];

$("#guardar").hide();

function agregar() {
		
idpro=$("#CboProP").val();		
producto=$("#CboProP option:selected").text();	
cantidad=$("#txtCantP").val();
preciocompra=$("#txtPreComP").val();
precioventa=$("#txtPreVenP").val();

if (idpro != "" && producto != "" && cantidad >0 && preciocompra != "" && precioventa != ""){
	
	subtotal[cont]=(cantidad*preciocompra);
	total=total+subtotal[cont];

	var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="txtIdProd[]" value="'+idpro+'">'+producto+'</td><td><input type="number" name="txtCant[]" value="'+cantidad+'"></td><td><input type="number" name="txtPreCom[]" value="'+preciocompra+'"></td><td><input type="number" name="txtPreVen[]" value="'+precioventa+'"></td><td>'+subtotal[cont]+'</td></tr>';
	cont++;
	limpiar();
	$("#total").html("S/. "+ total);
	evaluar();
	$("#tblDetalle").append(fila);
}
else{
	alert("Error al Ingresar, revise los datos  del Producto");
}

}
function limpiar(){

	$("#txtCantP").val("");
	$("#txtPreVenP").val("");
	$("#txtPreComP").val("");
}

function evaluar() {
	if (total > 0) {
		$("#guardar").show();
	}
	else{
		$("#guardar").hide();
	}
}

function eliminar(index) {
	total=total-subtotal[index];
	$("#total").html("S/. "+total);
	$("#fila"+index).remove();
	evaluar();
	
}
</script>
@endpush
@endsection

