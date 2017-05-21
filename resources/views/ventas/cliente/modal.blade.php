<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cli->id_per}}">
	{{Form::Open(array('action'=>array('ClienteController@destroy',$cli->id_per),'method'=>'delete'))}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="submit" data-dismiss="modal" aria-Label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Cliente</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar el Cliente</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-Primary">Confirmar</button>
				</div>
			</div>
		</div>
	{{Form::Close()}}
</div>