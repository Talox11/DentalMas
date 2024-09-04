<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use App\Models\UrlImagen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginasController extends Controller
{
    //
    public function index()
    {

        $paginas = Pagina::toBase()->get();
        // dd($paginas);
        return view('contenidos/Contenidos', compact('paginas'));
    }

    public function getInfo($id)
    {

        $contenido = (object)Pagina::toBase()->where('id', $id)->first();
        if ($contenido->id_imagen) {
            $imagenes = UrlImagen::toBase()->where('id', $contenido->id_imagen)->first();
            $contenido->url_imagen = $imagenes->url;
            $contenido->id_imagen = $imagenes->id;
        }

        return response()->json($contenido);
    }
    public function update(Request $request)
    {



        $destino = 'assets/images/dentalmas-custom';
        $id_imagen = $request->old_id_img;
        // dd($request->toArray());
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
            DB::table('paginas')
                ->where('id', $request->id_banner)
                ->update([
                    'titulo' => $request->titulo,
                    'subtitulo' => $request->subtitulo,
                    'detalles' => $request->detalles,
                    'id_imagen' => $id_imagen ,
                    'updated_at' => Carbon::now(),
                ]);
            DB::commit();


            session(['message' => 'El registro se ha actualizado']);
            session(['alert' => 'alert-success']);
        } catch (\Exception $e) {
            
            DB::rollback();
            session(['message' => 'Algo salió mal intente nuevamente']);
            session(['alert' => 'alert-danger']);
        }

        return redirect()->route('editarPagina');
    }

    public function faqs()
    {
        return view('contenidos/faqs');
    }
}
