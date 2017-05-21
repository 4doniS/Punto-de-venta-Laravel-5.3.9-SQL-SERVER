<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;

use SisVentas\Http\Requests;
use SisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use SisVentas\Http\Requests\PersonaFormRequest;
use DB;
class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$proveedores=DB::table('Persona')
    		->where('nom_per','LIKE','%'.$query.'%')
    		->where('tip_per','=','Proveedor')   
    		->orwhere('num_doc_per','LIKE','%'.$query.'%')
    		->where('tip_per','=','Proveedor')
    		->orderBy('id_per','desc')
    		->paginate(7);
    		return view('compras.proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("compras.proveedor.create");
    }
    public function store(PersonaFormRequest $request){
    	$proveedor= new Persona;
    	$proveedor->tip_per='Proveedor';   	
    	$proveedor->nom_per=$request->get("txtNombre");
    	$proveedor->tip_doc_per=$request->get("cboTipDoc");
    	$proveedor->num_doc_per=$request->get("txtNumDoc");
    	$proveedor->dir_per=$request->get("txtDirPer");
    	$proveedor->tel_per=$request->get("txtTel");
    	$proveedor->email_per=$request->get("txtEmail");
    	$proveedor->save();
    	return Redirect::to('compras/proveedor');

    }
    public function show($id){
    	return view("compras.proveedor.show",["proveedor"=>Persona::findOrFail($id)]);
    }
    public function edit($id){
    	return view("compras.proveedor.edit",["proveedor"=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request,$id){
    	$proveedor=Persona::findOrFail($id);
    	$proveedor->nom_per=$request->get("txtNombre");
    	$proveedor->tip_doc_per=$request->get("cboTipDoc");
    	$proveedor->num_doc_per=$request->get("txtNumDoc");
    	$proveedor->dir_per=$request->get("txtDirPer");
    	$proveedor->tel_per=$request->get("txtTel");
    	$proveedor->email_per=$request->get("txtEmail");
    	$proveedor->update();
    	return Redirect::to('compras/proveedor');
    }
    public function destroy($id){
    	$proveedor=Persona::findOrFail($id);
    	$proveedor->tip_per='Inactivo';
    	$proveedor->update();
    	return Redirect::to("compras/proveedor");
    } 
}
