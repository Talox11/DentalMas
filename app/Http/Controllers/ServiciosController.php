<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\UrlImagen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    //

    public function index()
    {


        if (!Auth::check()) {
            return redirect('/');
        }
        $servicios = Servicio::toBase()->get();

        foreach ($servicios as $servicio) {
            $contenidos = json_decode($servicio->contenido);
            $servicio->icono = $contenidos->icon;
        }

        return view('servicios/ListaServicios', compact('servicios'));
    }

    public function create()
    {
        return view('/servicios/CrearServicio');
    }
    public function detail(Request $request)
    {

        $servicio = Servicio::toBase()->where('id', $request->idServicio)->first();


        return response()->json($servicio);
    }
    public function uploadImg(Request $request)
    {

        return response()->json('done');
    }

    public function store(Request $request)
    {
        

        $active = 0;
        $destino = 'assets/images/dentalmas-custom';
        $id_imagen = $request->old_id_img;
        if ($request->active == 'on')
            $active = 1;

        $contenidos = [
            'consiste_tratamiento' => $request->consiste_tratamiento,
            'tratamiento_sirve' => $request->tratamiento_sirve,
            'entregables' => $request->entregables,
            'beneficios' => $request->beneficios,
            'icon' => $request->icon,
        ];

        DB::beginTransaction();
        try {
            if ($request->file('imagen') != null) {
                $nombre = $request->file('imagen')->getClientOriginalName();

                $imagen =  UrlImagen::create([
                    'url' => $request->file('imagen')->move($destino, $nombre),
                    'estatus' => 1,
                ]);
                $id_imagen = $imagen->id;
            }

            Servicio::create([
                'nombre' => $request->productname,
                'precio_base' => floatval(preg_replace("/[^-0-9\.]/", "", $request->price)),
                'descripcion' => $request->productdesc,
                'contenido' => json_encode($contenidos),
                'url_dentalink' => $request->dentalink,
                'id_imagen' => $id_imagen,
                'estatus' => $active,
            ]);
            
            DB::commit();

            session(['message' => 'El registro se ha guardado']);
            session(['alert' => 'alert-success']);
            return redirect()->route('serviciosLista');
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
            return redirect()->route('serviciosLista');
        }
    }
    public function updated(Request $request, $id)
    {

        $active = 0;

        if ($request->active == 'true')
            $active = 1;

        $contenidos = [
            'consiste_tratamiento' => $request->consiste_tratamiento,
            'tratamiento_sirve' => $request->tratamiento_sirve,
            'entregables' => $request->entregables,
            'beneficios' => $request->beneficios,
            'icon' => $request->icon,
        ];


        $precio_base = floatval(preg_replace("/[^-0-9\.]/", "", $request->precio_base));

        DB::beginTransaction();
        try {


            DB::table('servicios')
                ->where('id', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'precio_base' => $precio_base,
                    'descripcion' => $request->descripcion,
                    'contenido' => json_encode($contenidos),
                    'updated_at' => Carbon::now(),
                    'url_dentalink' => $request->dentalink,
                    'estatus' => $active,
                ]);
            DB::commit();


            session(['message' => 'El registro se ha actualizado']);
            session(['alert' => 'alert-success']);
            return response()->json('done');
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }
    }
}
