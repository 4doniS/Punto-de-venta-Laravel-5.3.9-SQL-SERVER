@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<h3>Listado de Ventas <a href="venta/create">
		<button type="button" class="btn btn-success">Nuevo</button></a></h3>
		<div class="form-group">
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" id="searchText" placeholder="Buscar.." value="{{$searchText}}" >
				<span class="input-group-btn">
					<button type="submit" id="buttonSearch" class="btn btn-primary">Buscar</button>
				</span>
			</div>
		</div>	
	</div>
</div>


<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="paginacion-ventas">
				<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>		
							<th>Codigo</th>					
							<th>Fecha</th>
							<th>CLiente</th>
							<th>Comprobante</th>
							<th>Impuesto</th>
							<th>Total</th>
							<th>Estado</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
					@foreach($ventas as $vent)
						<tr>
							<td>{{$vent->id_vent_pro}}</td>						
							<td>
								{{$vent->fech_vent}}
							</td>
							<td>
								{{$vent->nom_per}}
							</td>
							<td>
								{{$vent->tip_comp_vent.': '.$vent->ser_comp_vent.'-'.$vent->num_comp_vent}}
							</td>						
							<td>
								{{$vent->imp_vent}}
							</td>
							<td>
								{{$vent->total_vent}}
							</td>
							<td>
								{{$vent->est_vent}}
							</td>						
							<td>
								<a href="{{URL::action('VentaController@show',$vent->id_vent_pro)}}"><button type="button" class="btn btn-primary">Detalles</button></a>
								<a href="" data-target="#modal-delete-{{$vent->id_vent_pro}}" data-toggle="modal"><button type="button" class="btn btn-danger">Anular</button></a>
							</td>
						</tr>
						@include('ventas.venta.modal')
					@endforeach	
					</tbody>
				</table>
			</div>
			{{$ventas->render()}}
			</div>
			</div>
		</div>	
</div>

@push( 'scripts')
<script type="text/javascript">
$(document).on("click",".pagination a",function(e) {
	e.preventDefault();

	var page = $(this).attr('href').split('page=')[1];
	getVentas(page);

	
});
function getVentas(page) {
	$.ajax({
		url: '/ventas/venta/datos?page='+page		
	})
	.done(function(data) {
		$(".paginacion-ventas").html(data);
		//location.hash=page;
	});
	
}

$(document).on('click', '#buttonSearch', function(event) {
	event.preventDefault();	
	var text = $("#searchText").val();
	buscarText(text);
});

function buscarText(text) {
	jQuery.ajax({
	  url: '/ventas/venta/datos?searchText='+text,
	  success: function(result) {
	  	$(".paginacion-ventas").html(result);
	  }
	});
	
}
/*$(function() {
	var text = $('#searchText').val();
	Buscar(text);


});

function Buscar(text){
  $.ajax({
  	url: '/',  	
  	data: {text: 'text'},
  	success: function(result){

  	}
  });
  
}*/



</script>
@endpush
@endsection
