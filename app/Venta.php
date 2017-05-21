<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'Venta';

    protected $primaryKey='id_vent_pro';

    public $timestamps = false;

    protected $fillable = [
                       		'tip_comp_vent',
                    		'ser_comp_vent',
                    		'num_comp_vent',
                    		'fech_vent',
                    		'imp_vent',
                    		'total_vent',
                    		'est_vent',
                    		'id_per'
                    	   ];

    protected $guarded = [];


}
