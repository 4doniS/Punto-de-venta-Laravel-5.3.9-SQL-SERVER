<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "Persona";

    protected $primaryKey="id_per";

    public $timestamps = false;

    protected $fillable = [
    					  'tip_per',
    					  'nom_per',
    					  'tip_doc_per',
    					  'num_doc_per',
    					  'dir_per',
    					  'tel_per',
    					  'email_per'];

    protected $guarded = [];
}
