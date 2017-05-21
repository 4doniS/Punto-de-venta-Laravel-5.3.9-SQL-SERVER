<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use SisVentas\Http\Requests;
use SisVentas\Venta;
use Illuminate\Support\Facades\Redirect;
use SisVentas\Http\Requests\VentaFormRequest;
use SisVentas\DetalleVenta;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{

	function __construct()
	{
	    	 $this->middleware('auth');
	}

	public function index(Request $request){
		if($request){
			$query = trim($request->get('searchText'));
			$ventas =DB::table('venta as v')
					 ->join('persona as p','v.id_per','=','p.id_per')
					 ->join('detalle_venta as d','v.id_vent_pro','=','d.id_vent_pro')
					 ->select('v.id_vent_pro','v.fech_vent', 'p.nom_per','v.tip_comp_vent', 'v.ser_comp_vent',
					      'v.num_comp_vent','v.imp_vent','v.total_vent','v.est_vent')
					 ->where('v.num_comp_vent','LIKE','%'.$query.'%')
					->orderBy('v.id_vent_pro','desc')
					->groupBy('v.id_vent_pro','v.fech_vent','p.nom_per','v.tip_comp_vent','v.ser_comp_vent',
						'v.num_comp_vent','v.imp_vent','v.total_vent','v.est_vent')
					->paginate(7);

			return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
		}
	}


    public function Paginacion(Request $request){
        if($request){
            $query = trim($request->get('searchText'));
            $ventas =DB::table('venta as v')
                     ->join('persona as p','v.id_per','=','p.id_per')
                     ->join('detalle_venta as d','v.id_vent_pro','=','d.id_vent_pro')
                     ->select('v.id_vent_pro','v.fech_vent', 'p.nom_per','v.tip_comp_vent', 'v.ser_comp_vent',
                          'v.num_comp_vent','v.imp_vent','v.total_vent','v.est_vent')
                     ->where('v.num_comp_vent','LIKE','%'.$query.'%')
                    ->orderBy('v.id_vent_pro','desc')
                    ->groupBy('v.id_vent_pro','v.fech_vent','p.nom_per','v.tip_comp_vent','v.ser_comp_vent',
                        'v.num_comp_vent','v.imp_vent','v.total_vent','v.est_vent')
                    ->paginate(7);

            return view('ventas.venta.datos',["ventas"=>$ventas,"searchText"=>$query]);
        }
    }


	public function create(){

		$clientes = DB::table('persona')->where('tip_per','=','Cliente')->get();
		$productos = DB::table('Producto as p')
					->join('Detalle_Ingreso as d','p.id_pro','=','d.id_pro')
					->select(DB::raw("CONCAT(p.cod_pro,' ',p.nom_pro) as producto"),'p.stock_pro','p.id_pro',
						DB::raw('avg(d.pre_com_ing) as Precio_Promedio'))					
					->where('p.est_pro','=','Activo')
					->where('p.stock_pro','>','0')
					->groupBy('p.id_pro','p.stock_pro', 'p.cod_pro','p.nom_pro')
					->get();


		return view('ventas.venta.create',["clientes"=>$clientes,"productos"=>$productos]);
	}   

	public function store(VentaFormRequest $request){
		try {
    		DB::beginTransaction();
    		$venta = new Venta();
    		$venta->tip_comp_vent=$request->get('CboTipCom');
    		$venta->ser_comp_vent=$request->get('txtSerCom');
    		$venta->num_comp_vent=$request->get('txtNumCom');    		
    		$venta->total_vent=$request->get('txtTotVent');
    		$mytime= Carbon::now('America/Lima');
    		$venta->fech_vent=$mytime->toDateTimeString();
    		$venta->imp_vent='18';
    		$venta->est_vent='ACTIVO';
    		$venta->id_per=$request->get("CboCli");
    		$venta->save();

    		$idpro = $request->get('txtIdProd');
    		$cantidad = $request->get('txtCantVent');            
            $precioventa = $request->get('txtPreVen');
    		$descuento=$request->get('txtDesc');

    		$cont = 0 ;

    		while ($cont <count($idpro)) {
    			$detalle = new DetalleVenta();
    			$detalle->cant_det_vent=$cantidad[$cont];    			
    			$detalle->pre_vent=$precioventa[$cont];
    			$detalle->desc_vent=$descuento[$cont];
    			$detalle->id_vent_pro=$venta->id_vent_pro;
    			$detalle->id_pro=$idpro[$cont];
    			$detalle->save();    			

    			$cont=$cont+1;

    		}
    		DB::commit();
    	} catch (\Exception $e) {
    		DB::rollback();
    	}

		return Redirect::to('ventas/venta');

	} 


	 public function show($id){

    	$ventas=DB::table('venta as v')
            ->join('Persona as p','v.id_per','=','p.id_per')
            ->join('detalle_venta as d','v.id_vent_pro','=','d.id_vent_pro') 
            ->select('v.id_vent_pro','v.fech_vent','p.nom_per','v.tip_comp_vent','v.ser_comp_vent','v.num_comp_vent','v.imp_vent','v.est_vent','v.total_vent')->where('v.id_vent_pro','=',$id)
            ->first();



    	$detalles=DB::table('detalle_venta as d')
    	->join('Producto as p','d.id_pro','=','p.id_pro')
    	->select('p.nom_pro as producto','d.cant_det_vent','d.desc_vent','d.pre_vent')
    	->where('d.id_vent_pro','=',$id)
    	->get();

    	return view("ventas.venta.show",["venta"=>$ventas,"detalle"=>$detalles]);
    }

    public function destroy($id){
    	$venta=Venta::findOrFail($id);
    	$venta->est_vent='Cancelado';
    	$venta->update();

    	return Redirect::to('ventas/venta');
    }



}
