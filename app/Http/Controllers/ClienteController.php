<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;

use SisVentas\Http\Requests;
use SisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use SisVentas\Http\Requests\PersonaFormRequest;
use DB;
class ClienteController extends Controller
{
    public function __construct(){
            $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$clientes=DB::table('Persona')
    		->where('nom_per','LIKE','%'.$query.'%')
    		->where('tip_per','=','Cliente')   
    		->orwhere('num_doc_per','LIKE','%'.$query.'%')
    		->where('tip_per','=','Cliente')
    		->orderBy('id_per','desc')
    		->paginate(7);
    		return view('ventas.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("ventas.cliente.create");
    }
    public function store(PersonaFormRequest $request){
    	$cliente= new Persona;
    	$cliente->tip_per='Cliente';   	
    	$cliente->nom_per=$request->get("txtNombre");
    	$cliente->tip_doc_per=$request->get("cboTipDoc");
    	$cliente->num_doc_per=$request->get("txtNumDoc");
    	$cliente->dir_per=$request->get("txtDirPer");
    	$cliente->tel_per=$request->get("txtTel");
    	$cliente->email_per=$request->get("txtEmail");
    	$cliente->save();
    	return Redirect::to('ventas/cliente');

    }
    public function show($id){
    	return view("ventas.cliente.show",["cliente"=>Persona::findOrFail($id)]);
    }
    public function edit($id){
    	return view("ventas.cliente.edit",["cliente"=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request,$id){
    	$cliente=Persona::findOrFail($id);
    	$cliente->nom_per=$request->get("txtNombre");
    	$cliente->tip_doc_per=$request->get("cboTipDoc");
    	$cliente->num_doc_per=$request->get("txtNumDoc");
    	$cliente->dir_per=$request->get("txtDirPer");
    	$cliente->tel_per=$request->get("txtTel");
    	$cliente->email_per=$request->get("txtEmail");
    	$cliente->update();
    	return Redirect::to('ventas/cliente');
    }
    public function destroy($id){
    	$cliente=Persona::findOrFail($id);
    	$cliente->tip_per='Inactivo';
    	$cliente->update();
    	return Redirect::to("ventas/cliente");
    } 
}
