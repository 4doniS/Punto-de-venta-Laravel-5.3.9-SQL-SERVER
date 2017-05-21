@extends ('layouts.admin')
@section ('contenido')

	
		
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			<label form="">Proveedor</label>
			<p>{{$ingreso->nom_per}}</p>
		</div>	
	</div>	
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="tipocomprobante">Tipo Comprobante</label>
				<p>{{$ingreso->tip_comp_ing}}</p>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="seriecomprobante">Serie</label>
				<p>{{$ingreso->ser_comp_ing}}</p>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="numerocomprobante">Numero</label>
				<p>{{$ingreso->numero_comp_ing}}</p>
		</div>	
	</div>
		
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">		
			<div class="panel-body">				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="tblDetalle">
						<thead>
							<tr>								
								<th>Artículo</th>
								<th>Cantidad</th>
								<th>Precio Compra</th>
								<th>Precio venta</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tfoot>
							<th><h4>TOTAL</h4></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total">{{$ingreso->total}}</h4></th>
						</tfoot>
						<tbody>
							@foreach($detalle as $det)
							<tr>
								 <td>{{$det->producto}}</td>
								 <td>{{$det->cant_ing}}</td>
								 <td>{{$det->pre_com_ing}}</td>
								 <td>{{$det->pre_ven_ing}}</td>
								 <td>{{$det->cant_ing*$det->pre_com_ing}}</td>
							</tr>	
								@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>			
</div>			
		
@endsection

