<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;

use SisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // imagen subir
use SisVentas\Http\Requests\ProductoFormRequest;
use SisVentas\Producto;
use DB;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$productos=DB::table('Producto as a')
    		->join('categoria as c', 'a.id_cat_pro','=','c.id_cat_pro')
    		->select('a.id_pro','a.cod_pro','a.nom_pro','a.stock_pro','c.nom_cat_pro as categoria','a.desc_pro','a.img_pro','a.est_pro')
    		->where('a.nom_pro','LIKE','%'.$query.'%')
            ->where('a.cod_pro','LIKE','%'.$query.'%')
    		->orderBy('a.id_pro','desc')
    		->paginate(7);
    		return view('almacen.producto.index',["productos"=>$productos,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$categorias = DB::table('Categoria')->where('cond_cat_pro ','=','1')->get();
    	return view("almacen.producto.create",['categorias'=>$categorias]);
    }
    public function store(ProductoFormRequest $request){
    	$producto= new Producto;    	
    	$producto->cod_pro=$request->get('txtCod');
    	$producto->nom_pro=$request->get('txtNombre');
    	$producto->stock_pro=$request->get('txtStock');
    	$producto->desc_pro=$request->get('txtDesc');
    	$producto->est_pro='Activo';
    	$producto->id_cat_pro=$request->get('cboCodCate');
    	if(Input::HasFile('img')){
    		$file=Input::file('img');
    		$file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
    		$producto->img_pro=$file->getClientOriginalName();
    	}
    	$producto->save();
    	return Redirect::to('almacen/producto');

    }
    public function show($id){
    	return view("almacen.producto.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id){
    	$producto=Producto::findOrFail($id);
    	$categorias=DB::table('Categoria')->where('cond_cat_pro','=','1')->get();    	
    	return view("almacen.producto.edit",["producto"=>$producto,"categorias"=>$categorias]);
    }
    public function update(ProductoFormRequest $request,$id){
    	$producto=Producto::findOrFail($id);
    	$producto->cod_pro=$request->get('txtCod');
    	$producto->nom_pro=$request->get('txtNombre');
    	$producto->stock_pro=$request->get('txtStock');
    	$producto->desc_pro=$request->get('txtDesc');
    	$producto->id_cat_pro=$request->get('cboCodCate');
    	if(Input::HasFile('img')){
    		$file=Input::file('img');
    		$file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
    		$producto->img_pro=$file->getClientOriginalName();
    	}
    	$producto->update();
    	return Redirect::to('almacen/producto');
    }
    public function destroy($id){
    	$producto=Producto::findOrFail($id);
    	$producto->est_pro='Inactivo';
    	$producto->update();
    	return Redirect::to("almacen/producto");
    }
}
