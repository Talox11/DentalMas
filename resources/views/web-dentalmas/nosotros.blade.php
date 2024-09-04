@extends('web-dentalmas.index')
@section('contenido')
<section class="banner" style="background-image: url('{{ $urlImg->url ?? '' }} ');">
    <div class="container container-adjustment">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">

                    <span class="text-sm letter-spacing ">{{ $contenidos->subtitulo }}</span>
                    @if(isset($contenidos))
                    <h1 class="mb-3 mt-3 no-capitalize">{{ $contenidos->titulo }} </h1>
                    @else
                    <h1 class="mb-3 mt-3 testimonio-tittle">“Me han cambiado la vida.<br> Gracias a ustedes he aprendido a sonreír” </h1>
                    @endif
                    <div class="divider-large mb-3"></div>
                    <p class="mb-4 pr-5  subtitle-red">{{ $contenidos->detalles }}</p>
                    <div class="btn-container ">
                        <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                        <a href="#nuestras-sucursales" class="btn btn-secondary-2 btn-icon btn-round-full">SUCURSALES <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
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
                    <h1 class="title-color-red ">Misión</h1>
                    <p>Restablecer la salud bucal de la población, ofreciéndole servicios y productos de alta calidad, un trato digno y humano de nuestro personal capacitado en instalaciones cómodas y limpias, con precios justos y accesibles para toda la población </p>
                </div>
                <div class="section-title">
                    <h1 class="title-color-red ">Visión</h1>
                    <p>Ser la empresa líder en el país en ofrecer servicios y productos odontológicos de alta calidad, con precios justos y accesibles para toda la población. </p>
                    <div class="btn-container ">
                        <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                        <a href="#nuestras-sucursales" class="btn btn-secondary-2 btn-icon btn-round-full">SUCURSALES <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <a>
                    <div>
                        <img src="assets/images/dentalmas-custom/prev_5.jpg" alt="" style="width: 70%;">
                    </div>
                </a>

            </div>
        </div>
    </div>
</section>


<section class=".section-home-1 ">
    <div class="container container-adjustment">
        <div class="row justify-content-between align-items-center ">
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="">
                    <img src="assets/images/dentalmas-custom/prev_4.jpg" alt="" style="width: 100%;">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="cta-content">
                    <h2 class="mb-5 text-lg"><span class="title-color-red"> Valores </span></h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <lu>
                            <li>Confianza</li>
                            <li>Respeto</li>
                            <li>Compromiso</li>
                            <li>Puntualidad</li>
                            <li>Innovación</li>
                            <li>Empatía</li>
                        </lu>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <lu>
                            <li>Calidad</li>
                            <li>Honestidad</li>
                            <li>Responssabilidad</li>
                            <li>Perseverancia</li>
                            <li>Ética</li>
                            <li>Profesionalismo</li>
                        </lu>
                    </div>
                </div>
                <div class="section-title">
                    <h1 class="title-color-red ">Agenda tu experiencia</h1>
                    <div class="divider mb-4"></div>

                    <p>Contamos con 12 clínicas en la republica mexicana </p>


                    <div class="btn-container ">
                        <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                        <a href="#nuestras-sucursales" class="btn btn-secondary-2 btn-icon btn-round-full">SUCURALES <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="nuestras-sucursales" class="section service">
    <div class="container container-adjustment">
        <div class="row ">
            <div class="col-lg-7">
                <div class="section-title">
                    <h2>Nuestras Sucursales</h2>
                    <div class="divider-large  my-4"></div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($sucursales as $sucursal)
            
            <div class="card-sucursales gray-bg">
                <div class="img-box">
                    
                    
                    <?php echo htmlspecialchars_decode(stripslashes($sucursal->ulr_map));?>
                </div>
                <div class="content">
                    <h3>Suc. {{ $sucursal->ciudad }}</h3>
                    <p>{{ $sucursal->direccion}}</p>
                    <h5 style="margin-bottom: 0; margin-top: 10px;" class="heading">Telefonos </h5>
                    <p style="margin: 0;">Recepcion: {{ $sucursal->telefono }}</p>
                    <p style="margin: 0;">Whatsapp: {{ $sucursal->celular}}  <a style="font-size:20px;" href="https://api.whatsapp.com/send?phone=+52{{$sucursal->celular}}&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20servicios." class=" hoverwhite" target="_blank">
                                    <i class="fa fa-whatsapp my-float"></i>
                                </a> </p>
                    <div class="card-action">

                        <a href="{{ route('sucursal',$sucursal->ciudad) }}" class="btn btn-red btn-circled">Mas informacion</a>
                       
                    </div>
                </div>

            </div>

            @endforeach
        </div>
    </div>
</section>



@endsection