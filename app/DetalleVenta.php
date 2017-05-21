<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'Detalle_Venta';

    protected $primaryKey = "id_det_vent";

    public $timestamps = false;

    protected $fillable = [
    					   'cant_det_vent',
    					   'pre_vent',
    					   'desc_vent',
    					   'id_vent_pro',
    					   'id_pro'
    					   ];

    protected $guarded = [];
}
