<?php

use App\Models\Pagina;
use App\Models\Promocion;
use App\Models\PromocionServicio;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\UrlImagen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home-web');
});

Route::get('/home', function () {
    $contenidos = Pagina::toBase()->where('tipo', 'Principal (Home)')->orWhere('tipo', 'Central (Home)')->get();
    $tratamientos = Servicio::toBase()->where('estatus', 1)->get();
    $promocion = Promocion::toBase()->where('estatus', 1)->get();
 
    $promociones = PromocionServicio::toBase()->where('id_imagen', '!=', 'null')->get();


    foreach ($tratamientos as $tratamiento) {
        $aux = UrlImagen::toBase()->where('id', $tratamiento->id_imagen)->first();
        if ($aux != null)
            $aux = str_replace('\\', '/', $aux->url);
        $tratamiento->url_imagen = $aux;
    }

    foreach ($promociones as $promocion) {
        $aux = UrlImagen::toBase()->where('id', $promocion->id_imagen)->first();
        $servicio = Servicio::toBase()->where('id', $promocion->id_servicios)->first();
        // dd($servicio);
        if ($aux != null)
            $aux = str_replace('\\', '/', $aux->url);
        $promocion->url_imagen = $aux;
        $promocion->servicio = $servicio->nombre;
    }


    $urlImagenes = [];
    foreach ($contenidos as $contenido) {
        $urlImg = UrlImagen::toBase()->where('id', $contenido->id_imagen)->first();
        if ($urlImg != null)
            array_push($urlImagenes, str_replace('\\', '/', $urlImg->url,));
    }
    // dd($contenidos->toArray(), $urlImagenes);
    // return response()->json('index');
    return view('web-dentalmas.home', compact('contenidos', 'urlImagenes', 'promociones', 'tratamientos'));
})->name('home-web');

Route::get('/nosotros', [App\Http\Controllers\WebController::class, 'nosotros'])->name('nosotros');
Route::get('/servicios', [App\Http\Controllers\WebController::class, 'servicios'])->name('web-servicios');
Route::get('/servicios/{nombre}', [App\Http\Controllers\WebController::class, 'servicios_detail'])->name('web-servicios_detail');

// Route::get('/servicios/limpieza-dental', [App\Http\Controllers\WebController::class, 'limpieza_dental'])->name('limpieza-dental');
// Route::get('/servicios/ortodoncia-dental', [App\Http\Controllers\WebController::class, 'ortodoncia'])->name('ortodoncia-dental');
// Route::get('/servicios/resina-dental', [App\Http\Controllers\WebController::class, 'resina_dental'])->name('resina-dental');
// Route::get('/servicios/diagnostico-dental', [App\Http\Controllers\WebController::class, 'diagnostico_dental'])->name('diagnostico-dental');
Route::get('/servicios/pago/{servicio}', [App\Http\Controllers\WebController::class, 'checkout'])->name('pago_servicio');
Route::get('/servicios/pagos/{descuento}', [App\Http\Controllers\WebController::class, 'checkoutWDesc'])->name('pago_servicio_descuento');
Route::post('/servicios/verificar-cupon', [App\Http\Controllers\WebController::class, 'verificarCupon'])->name('verificar_cupon');
Route::post('/servicios/pago', [App\Http\Controllers\PaymentsController::class, 'procesar_pago'])->name('procesar_pago');
// Route::get('/lista-servicios/{servicio}', [App\Http\Controllers\WebController::class, 'servicio_detail'])->name('servicio_detail');
Route::get('/testimonios', [App\Http\Controllers\WebController::class, 'testimonios'])->name('testimonios');
Route::get('/sucursal/{nombre}', [App\Http\Controllers\WebController::class, 'sucursal'])->name('sucursal');
Route::get('/testimonio/{cliente}', [App\Http\Controllers\WebController::class, 'testimonio_detail'])->name('testimonios_detail');
Route::get('/testimonio-camilo', [App\Http\Controllers\WebController::class, 'testimonio_camilo'])->name('testimonio_camilo');
Route::get('/faqs', [App\Http\Controllers\WebController::class, 'faqs'])->name('faqs');
Route::get('/politicas-privacidad', [App\Http\Controllers\WebController::class, 'politicas_privacidad'])->name('politicas_privacidad');
Route::get('/politicas-cookies', [App\Http\Controllers\WebController::class, 'politicas_cookies'])->name('politicas_cookies');
Route::get('/terminos-condiciones', [App\Http\Controllers\WebController::class, 'terminos_condiciones'])->name('terminos_condiciones');


Auth::routes();
//routas a vistas de pagina web

Route::group(['middleware' => 'auth'], function () {
    //rutas a CRM Dental 
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');


    Route::post('/upload-img', [App\Http\Controllers\ServiciosController::class, 'uploadImg'])->name('uploadImg');


    Route::get('/lista-servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('serviciosLista');
    Route::get('/crear-servicio', [App\Http\Controllers\ServiciosController::class, 'create'])->name('crearServicio');
    Route::post('/servicio-detail', [App\Http\Controllers\ServiciosController::class, 'detail'])->name('detallesServicio');
    Route::post('/update-servicio/{idServicio}', [App\Http\Controllers\ServiciosController::class, 'updated'])->name('updateServicio');
    Route::post('/guardar-servicio', [App\Http\Controllers\ServiciosController::class, 'store'])->name('guardarServicio');
    //rutas a CRM Dental

    // Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

    Route::get('/promociones', [App\Http\Controllers\PromocionesController::class, 'index'])->name('promocionesLista');
    Route::get('/crear-promociones', [App\Http\Controllers\PromocionesController::class, 'create'])->name('crearPromocion');
    Route::get('/asignar-promocion', [App\Http\Controllers\PromocionesController::class, 'asignar'])->name('asignarPromocion');
    Route::post('/asignar-promocion', [App\Http\Controllers\PromocionesController::class, 'storeAsignar'])->name('storeAsignarPromocion');
    Route::post('/promocion-detail', [App\Http\Controllers\PromocionesController::class, 'detail'])->name('detallesPromocion');
    Route::post('/guardar-promociones', [App\Http\Controllers\PromocionesController::class, 'store'])->name('guardarPromocion');
    Route::post('/update-promocion/{idPromocion}', [App\Http\Controllers\PromocionesController::class, 'update'])->name('updatePromocion');
    Route::post('/promo-servicio-detail/{idPromocion}', [App\Http\Controllers\PromocionesController::class, 'promo_servicio_detail'])->name('promo_servicio_detail');
    Route::get('/asignar-promocion-sucursal', [App\Http\Controllers\PromocionesController::class, 'asignarSucursal'])->name('asignarPromocionSucursal');
    Route::post('/asignar-promocion-sucursal', [App\Http\Controllers\PromocionesController::class, 'storeAsignarSucursal'])->name('storeAsignarPromocionSucursal');

    Route::get('/actualizar-pagina', [App\Http\Controllers\PaginasController::class, 'index'])->name('editarPagina');
    Route::get('/getInfo-pagina/{id}', [App\Http\Controllers\PaginasController::class, 'getInfo'])->name('getInfo');
    Route::post('/update-pagina', [App\Http\Controllers\PaginasController::class, 'update'])->name('updatePaginas');



    Route::get('/lista-FAQs', [App\Http\Controllers\InformacionController::class, 'indexFAQs'])->name('listaFAQs');
    Route::get('/crear-FAQs', [App\Http\Controllers\InformacionController::class, 'createFAQs'])->name('crearFAQs');
    Route::post('/guardar-FAQs', [App\Http\Controllers\InformacionController::class, 'storeFAQs'])->name('guardarFAQs');
    Route::post('/update-FAQs/{idFaq}', [App\Http\Controllers\InformacionController::class, 'updateFaq'])->name('updateFAQs');
    Route::post('/faq-detail', [App\Http\Controllers\InformacionController::class, 'faq_detail'])->name('detailFAQs');

    Route::get('/lista-testimonios', [App\Http\Controllers\InformacionController::class, 'testimonio_index'])->name('lista_testimonios');
    Route::get('/crear-testimonios', [App\Http\Controllers\InformacionController::class, 'createTestimonios'])->name('crearTestimonios');
    Route::post('/guardar-testimonios', [App\Http\Controllers\InformacionController::class, 'storeTestimonios'])->name('storeTestimonios');
    Route::post('/update-testimonio', [App\Http\Controllers\InformacionController::class, 'updateTestimonio'])->name('updateTestimonio');
    Route::post('/testimonio-detail', [App\Http\Controllers\InformacionController::class, 'testimonio_detail'])->name('testimonioDetail');

    Route::get('/lista-sucursales', [App\Http\Controllers\InformacionController::class, 'sucursal_index'])->name('lista_sucursales');
    Route::get('/crear-sucursal', [App\Http\Controllers\InformacionController::class, 'createSucursal'])->name('crearSucursal');
    Route::post('/guardar-sucursal', [App\Http\Controllers\InformacionController::class, 'storeSucursal'])->name('storeSucursal');
    Route::post('/update-sucursal/{idSucursal}', [App\Http\Controllers\InformacionController::class, 'updateSucursal'])->name('updateSucursal');
    Route::post('/sucursal-detail', [App\Http\Controllers\InformacionController::class, 'sucursal_detail'])->name('sucursalDetail');



    //Update User Details
    Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
});
