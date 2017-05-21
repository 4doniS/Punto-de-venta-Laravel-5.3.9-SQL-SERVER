<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$vent->id_vent_pro}}">
	{{Form::Open(array('action'=>array('VentaController@destroy',$vent->id_vent_pro),'method'=>'delete'))}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="submit" data-dismiss="modal" aria-Label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Cancelar Venta</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Cancelar la Venta</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-Primary">Confirmar</button>
				</div>
			</div>
		</div>
	{{Form::Close()}}
</div>