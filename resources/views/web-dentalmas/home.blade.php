@extends('web-dentalmas.index')
@section('contenido')

<section class="banner" style="background-image: url('{{$urlImagenes[0] ?? '' }}');">
    <div class="container container-adjustment">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">

                    <span class="text-sm letter-spacing ">{{$contenidos[0]->subtitulo}}</span>
                    <h1 class="mb-3 mt-3 no-capitalize">{{$contenidos[0]->titulo}} </h1>
                    <div class="divider-large mb-3"></div>
                    <p class="mb-4 pr-5 subtitle-red">{{$contenidos[0]->detalles}} </p>
                    <div class="btn-container ">
                        <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                        <a href="{{route('nosotros')}}#nuestras-sucursales" class="btn btn-secondary-2 btn-icon btn-round-full">SUCURSALES <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-home-1" style="padding-top: 50px;">
    <div class="container container-adjustment">
        <div class="row justify-content-between align-items-center ">
            <div class="col-lg-7">
                <div class="section-title">
                    <h1 class="title-color-red ">¿Necesito Ortodoncia?</h1>
                    <p>
                    <p>Existen una serie de síntomas para conocer si se necesita Ortodoncia o corregir defectos en los dientes, si tienes los dientes torcidos o si los tienes separados. Si muerdes mal o tienes una mordida que encaja mal, si tus dientes están apiñados. Esto será un indicador que necesitas la asesoría de un Profesional. <a class="agrandar-texto" href="/servicios/Brackets" class="text-red" href=""> Los Brackets pueden ayudar y corregir la postura correcta de los dientes.</a> </p>

                    </p>

                </div>
                <div class="section-title">
                    <h1 class="title-color-red ">Sí, somos expertos</h1>

                    <p>Como especialistas en el campo de la odontología, sabemos que el cuidado de los dientes es una tarea delicada y debe ser realizada por un especialista. Por esta razón, nuestros especialistas están aquí para brindarle el mejor servicio.</p>

                    <div class="btn-container ">
                        <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                        <a href="#promociones-especiales" class="btn btn-secondary-2 btn-icon btn-round-full">PROMOCIONES <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-5 mt-lg-2">
                <div>
                    <img src="assets/images/dentalmas-custom/prev_3.jpg" alt="" style="width: 100%; display: block; margin: 0px auto;">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="cta-section ">
    <div class="container container-adjustment">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3 counter">1M</span>
                        <p>Clientes satisfechos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">1.2K</span>
                        <p>Horas de capacitación</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">+5</span>
                        <p>Años de experiencioa</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3 counter">12</span>
                        <p>Sucursales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section testimonial-2 gray-bg" id="promociones-especiales">
    <div class="container container-adjustment">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title">
                    <h2>Promociones Especiales</h2>
                    <div class="divider-large mx-auto my-4" style="margin-left: 0px !important;"></div>
                </div>
            </div>
        </div>
        <div class="container container-adjustment">
            <div class="row align-items-center">
                <div class="testimonial-wrap-2" style="max-width: 100%;">

                    @foreach($promociones as $promocion)


                    <div class=" style-2  gray-bg">
                        <a href="{{ route('pago_servicio',$promocion->servicio) }}">
                            <div class="slide">

                                <img class="slideImg img-fluid" src="{{ $promocion->url_imagen }}">

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


<section class=".section-home-1">
    <div class="container container-adjustment">
        <div class="row justify-content-between align-items-center ">
            <div class="col-lg-6">
                <div class="section-title">
                    <h1 class="title-color-red ">Nuestos pacientes <i class="fa fa-heart"></i></h1>
                    <p>Ana, con gran alegría y satisfacción nos cuenta su experiencia después de 1 año de tratamiento de ortodoncia. </p>
                </div>
                <div class="section-title">

                    <h2 style="color:#2d3c49">Tratamientos realizados</h2>
                    <ul>
                        <li>
                            Limpieza dental ultrasonica
                        </li>
                        <li>
                            Resina
                        </li>
                        <li>
                            Ortodoncia
                        </li>
                        <li>
                            Extracciones
                        </li>
                    </ul>


                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <a data-toggle="modal" data-target="#modal-testimonio-yt" class="wplightbox">
                    <div>
                        <img src="assets/images/dentalmas-custom/ana-preview.jpg" alt="" style="width: 100%;">
                    </div>
                </a>

            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">

            </div>

        </div>
    </div>
</section>


<section class="section testimonial-2 " style="padding-top: 0;">
    <div class="container container-adjustment">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title">
                    <h2>Conoce nuestros tratamientos</h2>
                    <div class="divider-large mx-auto my-4" style="margin-left: 0px !important;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($tratamientos as $servicio)
            <div class="card-sucursales gray-bg">
                <div class="img-box">
                    <img src="{{$servicio->url_imagen}}" alt="">
                </div>
                <div class="content">
                    <h3>{{ $servicio->nombre }}</h3>
                    <p>{{ $servicio->descripcion}}</p>
                    <div class="card-action">

                        <a href="{{ route('web-servicios_detail',$servicio->nombre) }}" class="btn btn-red btn-circled">Mas informacion</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="btn-container ">
                <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                <a href="{{ route('web-servicios') }}" class="btn btn-secondary-2 btn-icon btn-round-full">TRATAMIENTOS <i class="icofont-simple-right ml-2  "></i></a>
            </div>
        </div>
</section>


@endsection