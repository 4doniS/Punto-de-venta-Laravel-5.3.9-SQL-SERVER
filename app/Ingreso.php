<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='Ingreso';

    protected $primaryKey = "id_ing";

    public $timestamps = false;

    protected $fillable = [
    					  'tip_comp_ing', 
    					  'ser_comp_ing',
    					  'numero_comp_ing',
    					  'fech_ing',
    					  'imp_ing',
    					  'est_ing',
    					  'id_per'];

    protected $guarded = [];
}
