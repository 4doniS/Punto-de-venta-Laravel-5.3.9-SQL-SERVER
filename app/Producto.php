<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	 protected $table="Producto";

	 protected $primaryKey="id_pro";

	 public $timestamps=false;

	 protected $fillable =[
	 		'id_pro',
	 		'cod_pro',
	 		'nom_pro',
	 		'stock_pro',
	 		'desc_pro',
	 		'img_pro',
	 		'est_pro',
	 		'id_cat_pro'
	 ];   

	 protected $guarded =[
	 ];
}
