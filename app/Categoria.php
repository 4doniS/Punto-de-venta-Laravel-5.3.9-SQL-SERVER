<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='CATEGORIA';

    protected $primaryKey = "id_cat_pro";

    public $timestamps = false;

    protected $fillable = ['nom_cat_pro', 'desc_cat_pro', 'cond_cat_pro'];

    protected $guarded = [];
}
