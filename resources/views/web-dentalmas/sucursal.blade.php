@extends('web-dentalmas.index')
@section('contenido')

<section class="banner" style="background-image: url('/assets/images/dentalmas-custom/banner.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>
                    <span class="text-uppercase text-sm letter-spacing no-capitalize">Vuelve a sonreir con confianza</span>
                    <h1 class="mb-3 mt-3">Clínica Dental Mas <br>{{ $sucursal->ciudad }}</h1>

                    <p class="mb-4 pr-5">En nuestra clínica dental en la ciudad de {{ $sucursal->ciudad }} ofrecemos tratamientos dentales de todas las especialidades en Odontología. Te ayudamos a conseguir tu sonrisa soñada gracias a nuestro equipo de doctores especializados.</p>


                    <div class="btn-container ">
                        <a href="https://www.softwaredentalink.com/" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Haz una cita <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact form start -->

<section class="section contact-info pb-0">
    <div class="container ">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-live-support"></i>
                    <h5>Contactanos</h5>
                    Telefono: {{ $sucursal->telefono }} <br>
                    Celular: {{ $sucursal->celular }}
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5>Ubicacion</h5>
                    {{ $sucursal->direccion }}
                </div>
            </div>
        </div>
    </div>
</section>

<div class="col-lg-12">
    <div class="">
        <div class="card-body">
            <h4 class="card-title mb-4">Ubicacion en Google maps</h4>
            <?php echo htmlspecialchars_decode(stripslashes($sucursal->url_map)); ?>
        </div>
    </div>
</div>

<section class="section testimonial-2 gray-bg" id="promociones-especiales">
    <div class="container container-adjustment">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title">
                    <h2>Promociones disponibles esta sucursal</h2>
                    <div class="divider-large mx-auto my-4" style="margin-left: 0px !important;"></div>
                </div>
            </div>
        </div>
        <div class="container container-adjustment">
            <div class="row align-items-center">
                <div class="testimonial-wrap-2" style="max-width: 100%;">

                    @foreach($promociones as $promocion)

                   
                    <div class=" style-2  gray-bg">
                    <a href="{{ route('pago_servicio',$promocion->nombre) }}">
                        <div class="slide">
                           
                            <img class="slideImg img-fluid" src="/{{ $promocion->url }}">
                            
                        </div>
                    </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 style="color: #2d3c49;">Escoge tu sucursal para ver las promociones cerca de ti </h2>
                    <div class="btn-container ">
                        <a data-toggle="modal" data-target="#modal-sucursal-promo" class="btn btn-secondary-2 btn-icon btn-round-full">SELECCIONA TU SUCURSAL<i class="icofont-simple-down ml-2  "></i></a>

                    </div>
                </div>
            </div>
        </div>
</section>


@endsection