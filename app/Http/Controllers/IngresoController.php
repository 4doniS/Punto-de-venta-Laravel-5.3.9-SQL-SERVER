<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use SisVentas\Http\Requests; 
use SisVentas\Ingreso;
use Illuminate\Support\Facades\Redirect;
use SisVentas\Http\Requests\IngresoFormRequest;
use SisVentas\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
    function __construct()
    {
           $this->middleware('auth');
    }

    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$ingresos=DB::table('ingreso as i')
    		->join('Persona as p','i.id_per','=','p.id_per')
    		->join('detalle_ingreso as d','d.id_ing','=','i.id_ing') 
            ->select('i.id_ing','i.fech_ing','p.nom_per','i.tip_comp_ing','i.ser_comp_ing','i.numero_comp_ing','i.imp_ing','i.est_ing',DB::raw('sum(d.cant_ing*d.pre_com_ing) as total'))   		
    		->where('i.numero_comp_ing','LIKE','%'.$query.'%')
    		->orderBy('i.id_ing','desc')
    		->groupBy('i.id_ing','i.fech_ing','p.nom_per','i.tip_comp_ing','i.ser_comp_ing','i.numero_comp_ing','i.imp_ing','i.est_ing')
    		->paginate(7);

    		return view('compras.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);

    	}
    }    
    public function create(){
    	$proveedores=DB::table('Persona')->where('tip_per','=','Proveedor')->get();
    	$productos=DB::table('Producto as p')->select(DB::raw("CONCAT(p.cod_pro,' ' ,p.nom_pro ) as producto"),'p.id_pro')
    	->where('p.est_pro','=','Activo')
    	->get();

    	return view('compras.ingreso.create',["proveedor"=>$proveedores,"productos"=>$productos]);
    }

    public function store(IngresoFormRequest $request){
    	try {
    		DB::beginTransaction();
    		$ingreso = new Ingreso();
    		$ingreso->tip_comp_ing=$request->get('CboTipCom');
    		$ingreso->ser_comp_ing=$request->get('txtSerCom');
    		$ingreso->numero_comp_ing=$request->get('txtNumCom');
    		$mytime= Carbon::now('America/Lima');
    		$ingreso->fech_ing=$mytime->toDateTimeString();
    		$ingreso->imp_ing='18';
    		$ingreso->est_ing='Activo';
    		$ingreso->id_per=$request->get("CboPro");
    		$ingreso->save();

    		$idpro = $request->get('txtIdProd');
    		$cantidad = $request->get('txtCant');
    		$preciocompra=$request->get('txtPreCom');
    		$precioventa = $request->get('txtPreVen');

    		$cont = 0 ;

    		while ($cont < count($idpro)) {
    			$detalle = new DetalleIngreso();
    			$detalle->cant_ing=$cantidad[$cont];
    			$detalle->pre_com_ing=$preciocompra[$cont];
    			$detalle->pre_ven_ing=$precioventa[$cont];
    			$detalle->id_ing=$ingreso->id_ing;
    			$detalle->id_pro=$idpro[$cont];
    			$detalle->save();    			

    			$cont=$cont+1;

    		}
    		DB::commit();
    	} catch (\Exception $e) {
    		DB::rollback();
    	}

    	return Redirect::to('compras/ingreso');
    }

    public function show($id){

    	$ingreso=DB::table('ingreso as i')
            ->join('Persona as p','i.id_per','=','p.id_per')
            ->join('detalle_ingreso as d','i.id_ing','=','d.id_ing') 
            ->select('i.id_ing','i.fech_ing','p.nom_per','i.tip_comp_ing','i.ser_comp_ing','i.numero_comp_ing','i.imp_ing','i.est_ing',DB::raw('sum(d.cant_ing*d.pre_com_ing) as total'))->where('i.id_ing','=',$id)->groupBy('i.id_ing','i.fech_ing','p.nom_per','i.tip_comp_ing','i.ser_comp_ing','i.numero_comp_ing','i.imp_ing','i.est_ing')
            ->first();



    	$detalle =DB::table('detalle_ingreso as d')
    	->join('Producto as p','d.id_pro','=','p.id_pro')
    	->select('p.nom_pro as producto','d.cant_ing','d.pre_com_ing','d.pre_ven_ing')
    	->where('d.id_ing','=',$id)
    	->get();

    	return view("compras.ingreso.show",["ingreso"=>$ingreso,"detalle"=>$detalle]);
    }

    public function destroy($id){
    	$ingreso=Ingreso::findOrFail($id);
    	$ingreso->est_ing='Cancelado';
    	$Ingreso->update();

    	return Redirect::to('compras/ingreso');
    }



    
}
