@extends ('layouts.admin')
@section ('contenido')

	
		
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			<label form="">Proveedor</label>
			<p>{{$venta->nom_per}}</p>
		</div>	
	</div>	
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="tipocomprobante">Tipo Comprobante</label>
				<p>{{$venta->tip_comp_vent}}</p>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="seriecomprobante">Serie</label>
				<p>{{$venta->ser_comp_vent}}</p>
		</div>	
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="form-group">
				<label form="numerocomprobante">Numero</label>
				<p>{{$venta->num_comp_vent}}</p>
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
								<th>Precio venta</th>								
								<th>Descuento</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tfoot>
							<th><h4>TOTAL</h4></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total">{{$venta->total_vent}}</h4></th>
						</tfoot>
						<tbody>
							@foreach($detalle as $det)
							<tr>
								 <td>{{$det->producto}}</td>
								 <td>{{$det->cant_det_vent}}</td>
								 <td>{{$det->pre_vent}}</td>
								 <td>{{$det->desc_vent}}</td>
								 <td>{{$det->cant_det_vent*$det->pre_vent}}</td>
							</tr>	
								@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		<div class="panel panel-success">			
			<div class="panel-body">
				<a href="{{URL::previous()}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
			</div>
		</div>
	</div>			
</div>			
		
@endsection

