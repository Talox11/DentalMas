<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\Pagina;
use App\Models\Promocion;
use App\Models\PromocionSucursal;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\Testimonios;
use App\Models\UrlImagen;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //

    public function nosotros()
    {
        $contenidos = Pagina::toBase()->where('tipo', 'Nosotros (Inicio)')->first();
        $urlImg = UrlImagen::toBase()->where('id', $contenidos->id_imagen)->first();
        $sucursales = Sucursal::toBase()->where('estatus', 1)->get();
        foreach ($sucursales as $sucursal) {
            $sucursal->ulr_map = str_replace('width="600"', 'width="100%"', $sucursal->ulr_map);
            $sucursal->ulr_map = str_replace('height="450"', 'height="350"', $sucursal->ulr_map);
        }
        if ($urlImg != null)
            $urlImg->url = str_replace('\\', '/', $urlImg->url,);
        $mexicali = 'Mexicali';

        return view('web-dentalmas.nosotros', compact('contenidos', 'urlImg', 'mexicali', 'sucursales'));
    }
    public function servicios()
    {
        $contenidos = Pagina::toBase()->where('tipo', 'Servicios')->first();

        $urlImg = UrlImagen::toBase()->where('id', $contenidos->id_imagen)->first();
        if ($urlImg != null)
            $urlImg->url = str_replace('\\', '/', $urlImg->url,);

        $servicios = Servicio::toBase()->where('estatus', 1)->get();

        foreach ($servicios as $servicio) {
            $urlImagen = UrlImagen::toBase()->where('id', $servicio->id_imagen)->first();

            if ($urlImagen != null)
                $servicio->urlImg = str_replace('\\', '/', $urlImagen->url,);
            $contenidos2 = json_decode($servicio->contenido);
            $servicio->icono = $contenidos2->icon;
        }
        // dd($servicios);

        return view('web-dentalmas.servicios', compact('contenidos', 'urlImg', 'servicios', 'servicio'));
    }

    public function servicios_detail($nombre_tratamiento)
    {
        $servicio = Servicio::toBase()->where('nombre', $nombre_tratamiento)->first();
        $servicios = Servicio::toBase()->where('estatus', 1)->get();
        $faqs = Faqs::toBase()->where([['estatus', 1], ['categoria', 'servicio-' . $servicio->id]])->get();

        if ($servicio == null)
            return;
        $contenidos = json_decode($servicio->contenido);

        // dd($servicio);
        // dd($contenidos);
        return view('web-dentalmas.servicio-detail', compact('servicio', 'servicios', 'contenidos', 'faqs'));
    }


    public function checkout($nombre_tratamiento)
    {
        $servicio = Servicio::toBase()->where('nombre', $nombre_tratamiento)->first();
        $sucursales = Sucursal::toBase()->where('estatus', 1)->get();
        return view('web-dentalmas.pago_servicio', compact('servicio', 'sucursales'));
    }
    public function verificarCupon(Request $request)
    {
        // $cupon = 
        $cupon = Promocion::toBase()->where([['codigo', $request->codigo_cupon], ['estatus', 1]])->first();

        if ($cupon)
            return response()->json(['valido', $cupon]);
        else
            return response()->json('no valido');
        // $servicio = Servicio::toBase()->where('id', $request->idServicio)->first();
        // $precioIva = $servicio->precio_base*.16;

        // $totalConIva = $precioIva + $servicio->precio_base;
        // if($cupon->tipo == 'precio'){
        //     $totalConIva = $totalConIva - $cupon->descuento_cupon;
        // }else{
        //     $totalConIva = $servicio->precio_base - ( ( $cupon->descuento_cupon / 100) * $servicio->precio_base );
        // }
        // return view('web-dentalmas.pago_servicio', compact('servicio', 'precioIva','totalConIva','cupon'));
    }
    public function checkoutWDesc($promocion)
    {
        if ($promocion == 'promo-dental')
            $descuento = 100;
        elseif ($promocion == 'promo-dental')
            $descuento = 1200;
        elseif ($promocion == 'promo-dental')
            $descuento = 1300;
        else
            $descuento = 400;

        $total =  1857 - $descuento;
        return view('web-dentalmas.pago_servicio', compact('descuento', 'total'));
    }

    public function politicas_privacidad()
    {
        return view('web-dentalmas.politica_privacidad');
    }
    public function politicas_cookies()
    {
        return view('web-dentalmas.politica_cookies');
    }
    public function terminos_condiciones()
    {
        return view('web-dentalmas.terminos_condiciones');
    }
    public function servicio_detail()
    {
        $contenidos = Pagina::toBase()->where('tipo', 'Servicios')->first();

        $urlImg = UrlImagen::toBase()->where('id', $contenidos->id_imagen)->first();
        if ($urlImg != null)
            $urlImg->url = str_replace('\\', '/', $urlImg->url,);
        $servicios = Servicio::toBase()->where('estatus', 1)->get();
        foreach ($servicios as $servicio) {
            $servicio->contenido =  json_decode($servicio->contenido);
        }



        return view('web-dentalmas.servicio-detail', compact('contenidos', 'urlImg', 'servicios'));
    }
    public function testimonios()
    {
        $contenidos = Pagina::toBase()->where('tipo', 'Testimonios')->first();
        $urlImg = UrlImagen::toBase()->where('id', $contenidos->id_imagen)->first();
        if ($urlImg != null) {
            $urlImg->url = str_replace('\\', '/', $urlImg->url,);
        }
        $testimonios = (object)Testimonios::toBase()->where('estatus', 1)->get();
        $servicios = Servicio::toBase()->where('estatus', 1)->get();


        foreach ($testimonios as $testimonio) {
            $urlImg2 = UrlImagen::toBase()->where('id', $testimonio->id_imagen)->first();
            if ($urlImg2 != null)
                $testimonio->url_imagen = $urlImg2->url;
        }


        return view('web-dentalmas.testimonios', compact('contenidos', 'urlImg', 'testimonios', 'servicios'));
    }
    public function testimonio_detail($idTestimonio)
    {

        $contenidos = Pagina::toBase()->where('tipo', 'Testimonios')->first();
        $urlImg = UrlImagen::toBase()->where('id', $contenidos->id_imagen)->first();

        if ($urlImg != null)
            $urlImg->url = str_replace('\\', '/', $urlImg->url,);
        $testimonios = Testimonios::toBase()->where('estatus', 1)->get();
        $testimonio = (object)Testimonios::toBase()->where('id', $idTestimonio)->first();

        $imagen_testimonio = UrlImagen::toBase()->where('id', $testimonio->id_imagen)->first();
        if ($imagen_testimonio != null)
            $imagen_testimonio->url = str_replace('\\', '/', $imagen_testimonio->url,);
        $testimonio->imagen = $imagen_testimonio->url;


        $tratamientos = [];
        foreach (json_decode($testimonio->tratamientos) as $tratamiento) {
            $servicio = Servicio::toBase()->where([['estatus', 1], ['id', $tratamiento]])->first();
            array_push($tratamientos, (object)[
                'tratamiento' => $servicio,
            ]);
        }

        return view('web-dentalmas.testimonio-detail', compact('contenidos', 'urlImg', 'testimonios', 'testimonio', 'tratamientos'));
    }
    public function testimonio_camilo()
    {
        $contenidos = Pagina::toBase()->where('tipo', 'Testimonios')->first();
        $urlImg = UrlImagen::toBase()->where('id', $contenidos->id_imagen)->first();
        if ($urlImg != null)
            $urlImg->url = str_replace('\\', '/', $urlImg->url,);
        $testimonios = Testimonios::toBase()->where('estatus', 1)->get();
        return view('web-dentalmas.testimonio_camilo', compact('contenidos', 'urlImg', 'testimonios'));
    }

    public function sucursal($ciudad)
    {
        $sucursal = Sucursal::toBase()->where([['ciudad', $ciudad], ['estatus', 1]])->first();

        $promociones = PromocionSucursal::select('promocion_sucursal.*', 'imagenes.url', 'servicios.nombre')
            ->leftjoin('imagenes', 'imagenes.id', '=', 'promocion_sucursal.id_imagen')
            ->leftjoin('servicios', 'servicios.id', '=', 'promocion_sucursal.id_servicio')
            ->where([['promocion_sucursal.id_sucursal', $sucursal->id], ['promocion_sucursal.estatus', 1]])->get();

        foreach ($promociones as $promocion) {
            if ($promocion->url != null)
                $promocion->url = str_replace('\\', '/', $promocion->url);
        }

        if ($sucursal == null) {
            return redirect()->route('nosotros');
        }
        $sucursal = (object)$sucursal;

        $sucursal->url_map = str_replace('width="600"', 'width="100%"', $sucursal->ulr_map);
        $contenidos = Pagina::toBase()->where('tipo', 'Testimonios')->first();
        $urlImg = UrlImagen::toBase()->where('id', $contenidos->id_imagen)->first();
        if ($urlImg != null)
            $urlImg->url = str_replace('\\', '/', $urlImg->url,);
        $testimonios = Testimonios::toBase()->where('estatus', 1)->get();

        return view('web-dentalmas.sucursal', compact('contenidos', 'urlImg', 'testimonios', 'sucursal', 'promociones'));
    }
    public function faqs()
    {
        $faqs = Faqs::toBase()->where('estatus', 1)->get();
        return view('web-dentalmas.faqs', compact('faqs'));
    }
}
