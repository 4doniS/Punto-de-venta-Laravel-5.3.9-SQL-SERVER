<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table='Detalle_Ingreso';

    protected $primaryKey = "id_det_ing";

    public $timestamps = false;

    protected $fillable = [
    					  'cant_ing', 
    					  'pre_com_ing',
    					  'pre_ven_ing',
    					  'id_ing',
    					  'id_pro'
    					  ];

    protected $guarded = [];
}
