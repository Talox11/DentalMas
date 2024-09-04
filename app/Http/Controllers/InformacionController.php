<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\Testimonios;
use App\Models\UrlImagen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformacionController extends Controller
{
    //

    public function indexFAQs()
    {
        $faqs = Faqs::toBase()->get();
        return view('informacion/listaFaqs', compact('faqs'));
    }
    public function createFAQs()
    {

        $servicios = Servicio::toBase()->where('estatus', 1)->get();
        return view('informacion/crearFaqs', compact('servicios'));;
    }

    public function faq_detail(Request $request)
    {
        $faq = Faqs::toBase()->where('id', $request->idFaq)->first();
        return response()->json($faq);
    }
    public function storeFAQs(Request $request)
    {


        DB::beginTransaction();
        try {

            Faqs::create([
                'pregunta' => $request->pregunta,
                'categoria' => $request->categoria,
                'respuesta' => $request->respuesta,
                'estatus' => 1,
            ]);
            DB::commit();

            session(['message' => 'El registro se ha guardado']);
            session(['alert' => 'alert-success']);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }

        return redirect()->route('listaFAQs');
    }

    public function updateFaq(Request $request, $id)
    {


        DB::beginTransaction();
        try {

            $active = 0;
            if ($request->active == 'true')
                $active = 1;
            DB::table('faqs')
                ->where('id', $id)
                ->update([
                    'pregunta' => $request->pregunta,
                    'categoria' => $request->categoria,
                    'respuesta' => $request->respuesta,
                    'updated_at' => Carbon::now(),
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
        return redirect()->route('listaFAQs');
    }


    public function testimonio_index()
    {
        $tratamientos = Servicio::toBase()->where('estatus', 1)->get();
        $testimonios = Testimonios::toBase()->where('estatus', 1)->get();
        // dd($testimonios);
        return view('informacion/listaTestimonios', compact('testimonios', 'tratamientos'));
    }

    public function testimonio_detail(Request $request)
    {
        $testimonio = (object)Testimonios::toBase()->where('id', $request->idTestimonio)->first();
        if ($testimonio->id_imagen) {
            $imagenes = UrlImagen::toBase()->where('id', $testimonio->id_imagen)->first();
            $testimonio->url_imagen = $imagenes->url;
            $testimonio->id_imagen = $imagenes->id;
        }
        return response()->json($testimonio);
    }

    public function createTestimonios()
    {
        $tratamientos = Servicio::toBase()->where('estatus', 1)->get();
        return view('informacion/crearTestimonios', compact('tratamientos'));
    }


    public function storeTestimonios(Request $request)
    {


        $destino = 'assets/images/dentalmas-custom';
        $id_imagen = null;
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
            Testimonios::create([
                'nombre' => $request->nombre,
                'fecha' => $request->fecha,
                'titulo' => $request->titulo,
                'descripcion' => $request->testimonio,
                'id_imagen' => $id_imagen,
                'url_video' => $request->url_video,
                'tratamientos' => json_encode($request->tratamientos),
                'estatus' => 1,
            ]);
            DB::commit();

            session(['message' => 'El registro se ha guardado']);
            session(['alert' => 'alert-success']);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }
        return redirect()->route('lista_testimonios');
    }

    public function storeImgTestimonios(Request $request, $idTestimonio)
    {
        dd($request->toArray());
    }

    public function updateTestimonio(Request $request)
    {
        $id = $request->idTestimonio;


        $destino = 'assets/images/dentalmas-custom';
        $id_imagen = $request->old_id_img;
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

            DB::table('testimonios')
                ->where('id', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'fecha' => $request->fecha,
                    'titulo' => $request->titulo,
                    'descripcion' => $request->testimonio,
                    'id_imagen' => $id_imagen,
                    'url_video' => $request->url_video,
                    'updated_at' => Carbon::now(),
                ]);


            DB::commit();
            session(['message' => 'El registro se ha actualizado']);
            session(['alert' => 'alert-success']);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }
        return redirect()->route('lista_testimonios');
    }


    public function sucursal_index()
    {
        $sucursales = Sucursal::toBase()->get();
        
        foreach ($sucursales as $sucursal) {
            if ($sucursal->horario) {

                
                $sucursal->horario = json_decode($sucursal->horario);
            }
        }
        

        return view('informacion/listaSucursales', compact('sucursales'));
    }
    public function createSucursal()
    {

        return view('informacion/crearSucursal');
    }
    public function storeSucursal(Request $request)
    {

        $horarios = [];
        foreach ($request->dia_inicio as $index => $dia) {

            $horario = ["dia" => $request->dia_inicio[$index] . '- ' . $request->dia_final[$index] . ': ' . $request->hora_inicio[$index] . ' a ' . $request->hora_final[$index]];
            array_push($horarios, $horario);
        }



        DB::beginTransaction();
        try {
            $active = false;
            if ($request->active == 'on')
                $active = true;
            Sucursal::create([
                'ciudad' => $request->ciudad,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'celular' => $request->celular,
                'ulr_map' => $request->link_maps,
                'horario' => json_encode($horarios),
                'estatus' => $active,
            ]);
            DB::commit();

            session(['message' => 'El registro se ha guardado']);
            session(['alert' => 'alert-success']);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }
        return redirect()->route('lista_sucursales');
    }
    public function updateSucursal(Request $request, $id)
    {

        DB::beginTransaction();
        try {

            if ($request->estatus)
                $estatus = 1;
            else
                $estatus = 0;

            DB::table('sucursal')
                ->where('id', $id)
                ->update([
                    'ciudad' => $request->ciudad,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'celular' => $request->celular,
                    'ulr_map' => $request->ulr_map,
                    'horario' => '',
                    'estatus' => $estatus,
                    'updated_at' => Carbon::now(),
                ]);
            DB::commit();
            session(['message' => 'El registro se ha actualizado']);
            session(['alert' => 'alert-success']);
            return response()->json('done');
        } catch (\Exception $e) {
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }
    }
    public function sucursal_detail(Request $request)
    {
        $sucursal = Sucursal::toBase()->where('id', $request->idSucursal)->first();
        return response()->json($sucursal);
    }

    public function mergeArray($input_array) //metodo para hacer un arreglo de n dimensiones en 1 (arreglo de arreglos en arreglo)
    {
        $output_array = array();
        dd(count($input_array), $input_array);
        for ($i = 0; $i < count($input_array); $i++) {
            for ($j = 0; $j < count($input_array[$i]); $j++) {
                $output_array[] = $input_array[$i][$j];
            }
        }

        return $output_array;
    }
}
