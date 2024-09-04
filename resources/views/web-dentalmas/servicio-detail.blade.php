@extends('web-dentalmas.index')
@section('contenido')
<section class="banner" style="background-image: url('/assets/images/dentalmas-custom/banner/Banner1728x824_32.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>

                    <h1 class="mb-3 mt-3 no-capitalize">{{ $servicio->nombre }} </h1>

                    <p class="mb-4 pr-5 text-red">Cada uno de nosotros tiene un sonrisa bella y unica, es por eso que necesitas lucirla</p>
                    <div class="btn-container ">
                        <a href="{{ route('pago_servicio', $servicio->nombre) }}" class="btn btn-main-2 btn-icon btn-round-full">Pagar en linea <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class=".section-home-1 " style="padding-top:90px;">
    <div class="container container-adjustment">
        <div class="row justify-content-between align-items-center " style="align-items: start !important;">
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="cta-content">
                    <h1 class="mb-5 text-lg-bigger"><span class="title-color-red"> Tratamientos </span></h1>
                </div>
                <div class="row">
                    <ul class="list-unstyled footer-menu lh-35">
                        @foreach($servicios as $servicioa)
                        <li><a href="{{ route('web-servicios_detail',$servicioa->nombre) }}">
                                <p>{{$servicioa->nombre}}</p>
                            </a></li>
                        <div class="divider-larger-black mb-3"></div>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="case-content">
                        <h2 class="mb-3 text-red">¿Que es {{ $servicio->nombre }}?</h2>
                        <p>{{ $servicio->descripcion }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 order-2 order-lg-12">
                        <div class="case-content">
                            <h2 class="mb-3 text-red text-30">¿Para qué sirve?</h2>
                            <p style="text-align: justify;">{{ $contenidos->tratamiento_sirve }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 order-2 order-lg-12">
                        <div class="case-content">
                            <h2 class="mb-3 text-red text-30">Beneficios</h2>
                            @foreach($contenidos->beneficios as $beneficio)
                            <p>- {{ $beneficio }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 order-2 order-lg-12">
                        <div class="case-content">
                            <h4 class="mb-3 text-red text-30">¿En que consiste la limpieza ultrasónica?</h4>
                            <p>{{ $contenidos->consiste_tratamiento }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 order-2 order-lg-12">
                        <div class="case-content">
                            <h4 class="mb-3 text-red text-30">Entregables</h4>
                            @foreach($contenidos->entregables as $entregable)
                            <p>- {{ $entregable }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 order-2 order-lg-12">
                        <div class="case-content">
                            <h4 class="mb-3 text-red text-30">Indicaciones</h4>
                            <p><strong>¿Como debo acudir?</strong></p>
                            <p>- Con los dientes cepillados</p>
                            <p><strong>¿Que debo presentar?</strong></p>
                            <p>- Identificaion oficial</p>
                            <p>- Tutor en caso de ser menor de edad</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 order-2 order-lg-12">
                        <div class="case-content">
                            <h2 class="mb-4 text-red">Preguntas Frecuentes<br>Faq's</h2>
                            @foreach ($faqs as $faq)
                            <div class="col-lg-12">
                                <div class="case-content">
                                    <h4 class="mb-3 text-red">{{ $faq->pregunta }}</h4>
                                    <p>{{ $faq->respuesta }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection