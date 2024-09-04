<link rel="stylesheet" href="{{ URL::asset('assets/css/dental-css/custom-servicios.css') }}">
@extends('web-dentalmas.index')
@section('contenido')

<section class="banner" style="background-image: url('{{ $urlImg->url ?? '' }} ');">
    <div class="container container-adjustment">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">

                    <span class="text-uppercase text-sm letter-spacing ">{{ $contenidos->subtitulo }}</span>
                    @if(isset($contenidos))
                    <h1 class="mb-3 mt-3 no-capitalize">{{ $contenidos->titulo }} </h2>
                        @else
                        <h1 class="mb-3 mt-3 ">“Me han cambiado la vida.<br> Gracias a ustedes he aprendido a sonreír” </h1>
                        @endif
                        <div class="divider divider-large mb-2"></div>
                        <p class="mb-4 pr-5">{{ $contenidos->detalles }}</p>
                        <div class="btn-container ">
                            <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                            <a href="{{route('nosotros')}}#nuestras-sucursales" class="btn btn-secondary-2 btn-icon btn-round-full">SUCURSALES <i class="icofont-simple-right ml-2  "></i></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section service gray-bg">
    <div class="container container-adjustment">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>¿Estás buscando una forma de mejorar tu sonrisa? </h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>¡Nuestros tratamientos dentales pueden ayudarte! Tenemos una amplia variedad de tratamientos para mejorar tu sonrisa, desde blanqueamiento dental hasta corrección de los dientes. ¡No importa qué problema tengas con tus dientes, nosotros podemos ayudarte!</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($servicios as $servicio)
            <div  class="col-lg-6 col-md-6 col-sm-6">
                <div style="background: #fff0;" class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <img style="border-radius:10px;" src="{{$servicio->urlImg}}" alt="" class="img-fluid">
                    </div>
                    
                    <div class="content">
                        <a href="{{ route('web-servicios_detail',$servicio->nombre) }}" class="btn btn-secondary-2 btn-icon btn-round-full">MAS INFORMACIÓN <i class="icofont-simple-right ml-2 black-i"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="section department-single">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="department-img manifiesto-img">
                    <img src="assets/images/dentalmas-custom/banner_flechas.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection