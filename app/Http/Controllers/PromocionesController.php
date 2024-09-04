<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Promocion;
use App\Models\PromocionServicio;
use App\Models\PromocionSucursal;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\UrlImagen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromocionesController extends Controller
{
    //

    public function index()
    {
        $promociones = Promocion::toBase()->get();

        return view('promociones/PromocionesLista', compact('promociones'));
    }


    public function create()
    {
        $sucursales = Sucursal::toBase()->where('estatus', '1')->get();

        return view('promociones/CrearPromocion', compact('sucursales'));
    }
    public function detail(Request $request)
    {
        $promocion = Promocion::toBase()->where('id', $request->idPromocion)->first();
        return response()->json($promocion);
    }


    public function store(Request $request)
    {

        $sucursales = Sucursal::toBase()->where('estatus', '1')->get(['id']);
        $temp_sucursales = [];
        if (!isset($request->chkTodo)) {
            foreach ($request->toArray() as $parametro => $valor) {
                if (Str::contains($parametro, 'chkSucursal')) {
                    $idSucursal = Str::substr($parametro, 11);
                    array_push($temp_sucursales, $idSucursal);
                }
            }
        } else {
            foreach ($sucursales as $sucursal) {
                array_push($temp_sucursales, $sucursal->id);
            }
        }
        $sucursales = $temp_sucursales;




        $this->validate($request, [
            'tipopromocion' => 'required|string|max:255',
            'codigocupon' => 'required|string|max:255',
            'inversionini' => 'required|numeric',
            'descuentocupon' => 'required|numeric',
            'start' => 'required',
            'end' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $active = false;
            $chk_vigencia = false;
            $chk_agotar_exist = false;
            if ($request->active == 'on')
                $active = true;
            if ($request->chkVigencia == 'on')
                $chk_vigencia = true;
            if ($request->chkAgotarExistencia == 'on')
                $chk_agotar_exist = true;
            $promocion = Promocion::create([
                'tipo' => $request->tipopromocion,
                'codigo' => $request->codigocupon,
                'terminos' => $request->terminosdesc ?? '',
                'inv_inicial' => $request->inversionini,
                'descuento_cupon' => $request->descuentocupon,
                'chk_vigencia' => $chk_vigencia,
                'chk_agotar_exist' => $chk_agotar_exist,
                'inicio' => date('Y-m-d H:i:s', strtotime($request->start)),
                'fin' =>  date('Y-m-d H:i:s', strtotime($request->end)),
                'estatus' => $active,
            ]);

            foreach ($sucursales as $sucursal) {
                PromocionSucursal::create([
                    'id_promocion' => $promocion->id,
                    'id_sucursal' => $sucursal,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            DB::commit();

            session(['message' => 'El registro se ha guardado']);
            session(['alert' => 'alert-success']);
            return redirect()->route('promocionesLista');
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
            return redirect()->route('promocionesLista');
        }
    }
    public function update(Request $request, $id)
    {

        $active = 0;
        $chk_vigencia = 0;
        $chk_agotar_exist = 0;
        if ($request->active == 'true')
            $active = 1;
        if ($request->chk_vigencia == 'true')
            $chk_vigencia = 1;
        if ($request->chk_agotar_exist == 'true')
            $chk_agotar_exist = 1;


        DB::beginTransaction();
        try {

            DB::table('promociones')
                ->where('id', $id)
                ->update([
                    'tipo' => $request->tipo,
                    'codigo' => $request->codigo,
                    'terminos' => $request->terminos ?? '',
                    'inv_inicial' => $request->inv_inicial,
                    'descuento_cupon' => $request->descuento_cupon,
                    'chk_vigencia' => $chk_vigencia,
                    'chk_agotar_exist' => $chk_agotar_exist,
                    'inicio' => $request->inicio,
                    'fin' => $request->fin,
                    'estatus' => $active,
                    'updated_at' => Carbon::now(),
                ]);

            DB::commit();

            session(['message' => 'El se han actualizado correctamente la promocion']);
            session(['alert' => 'alert-success']);
            return response()->json('done');
        } catch (\Exception $e) {

            DB::rollback();
            session(['message' => 'Algo sali�� mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
            return redirect()->route('promocionesLista');
        }
    }

    public function asignar()
    {
        $promociones = Promocion::toBase()->where('estatus', 1)->get();
        $servicios = Servicio::toBase()->where('estatus', 1)->get();

        return view('promociones/AsignarPromocion', compact('promociones', 'servicios'));
    }
    public function storeAsignar(Request $request)
    {

        $destino = 'assets/images/dentalmas-custom';
        $id_imagen = null;
        $nombre = $request->file('imagen')->getClientOriginalName();
        $promos_selected = [];

        foreach ($request->toArray() as $key => $value) {
            $promo = Promocion::toBase()->where('id', $key)->first();
            if (isset($promo))
                array_push($promos_selected, $promo->id);
        }

        DB::beginTransaction();
        try {

            if ($request->file('imagen') != null) {

                $imagen =  UrlImagen::create([
                    'url' => $request->file('imagen')->move($destino, $nombre),
                    'estatus' => 1,
                ]);
                $id_imagen = $imagen->id;
            }

            foreach ($promos_selected as $promo) {
                PromocionServicio::create([
                    'id_servicios' => $request->servicio,
                    'id_promocion' => $promo,
                    'id_imagen' => $id_imagen
                ]);
            }
            DB::commit();
            session(['message' => 'El registro se ha guardado']);
            session(['alert' => 'alert-success']);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }
        return redirect()->route('asignarPromocion');

        return view('promociones/AsignarPromocion', compact('promociones', 'servicios'));
    }

    public function promo_servicio_detail(Request $request)
    {
        $promo_servicio = PromocionServicio::toBase()->where('id_promocion', $request->idPromocion)->get();
        return response()->json($promo_servicio);
    }
    public function asignarSucursal(Request $request)
    {
        $sucursales = Sucursal::toBase()->where('estatus', '1')->get();
        $servicios = Servicio::toBase()->where('estatus', 1)->get();
        return view('promociones/CrearPromocionSucursal',compact('sucursales','servicios'));
    }
    public function storeAsignarSucursal(Request $request)
    {
        $destino = 'assets/images/dentalmas-custom';
        $id_imagen = null;
        $nombre = $request->file('imagen')->getClientOriginalName();
        $promos_selected = [];

        

        $sucursales = Sucursal::toBase()->where('estatus', '1')->get(['id']);
        $temp_sucursales = [];
        if (!isset($request->chkTodo)) {
            foreach ($request->toArray() as $parametro => $valor) {
                if (Str::contains($parametro, 'chkSucursal')) {
                    $idSucursal = Str::substr($parametro, 11);
                    array_push($temp_sucursales, $idSucursal);
                }
            }
        } else {
            foreach ($sucursales as $sucursal) {
                array_push($temp_sucursales, $sucursal->id);
            }
        }
        $sucursales = $temp_sucursales;


        DB::beginTransaction();
        try {

            if ($request->file('imagen') != null) {

                $imagen =  UrlImagen::create([
                    'url' => $request->file('imagen')->move($destino, $nombre),
                    'estatus' => 1,
                ]);
                $id_imagen = $imagen->id;
            }

            foreach ($sucursales as $sucursal) {
                PromocionSucursal::create([
                    'id_sucursal' => $sucursal,
                    'id_servicio' => $request->servicio,
                    'precio_descuento' => $request->nuevo_precio,
                    'id_imagen' => $id_imagen,
                    'estatus' => 1
                ]);
            }
            DB::commit();
            session(['message' => 'El registro se ha guardado']);
            session(['alert' => 'alert-success']);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }
        return redirect()->route('asignarPromocionSucursal');
    }
    
}
