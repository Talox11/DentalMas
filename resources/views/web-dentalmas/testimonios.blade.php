@extends('web-dentalmas.index')
@section('contenido')
<section class="banner" style="background-image : url('{{ $urlImg->url ?? '' }} ');" >
    <div class="container container-adjustment">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">

                    <span class="text-sm letter-spacing ">{{ $contenidos->subtitulo }}</span>
                    @if(isset($contenidos))
                    <h2 class="mb-3 mt-1 testimonio-tittle" >{{ $contenidos->titulo }}</h2>
                    @else
                    <h2 class="mb-3 mt-1 testimonio-tittle">“Me han cambiado la vida.<br> Gracias a ustedes he aprendido a sonreír” </h2>
                    @endif
                    <div class="divider-large mb-2"></div>
                    <p class="mb-4 pr-5" >{{ $contenidos->detalles }}</p>
                    <div class="btn-container ">
                        <a data-toggle="modal" data-target="#modalagenda" class="btn btn-main-2 btn-icon btn-round-full">AGENDA UNA CITA <i class="icofont-simple-right ml-2  "></i></a>
                        <a href="{{route('nosotros')}}#nuestras-sucursales" class="btn btn-secondary-2 btn-icon btn-round-full">SUCURSALES <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section doctors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Casos Reales</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>A continuación, te mostramos una <strong>selección de casos de pacientes que hemos tratado</strong> en nuestras clínicas dentales. <br> Como verás, llevamos a cabo tratamientos en todas las áreas de la Odontología: Ortodoncia, Implantología, Periodoncia, Estética y General.</p>
                </div>
            </div>
        </div>

        <div class="col-12 text-center  mb-5">
            <div class="btn-group btn-group-toggle " style="display:contents;" data-toggle="buttons">
                <label class="btn active ">
                    <input type="radio" name="shuffle-filter" value="all" checked="checked" />Todos
                </label>
                @foreach($servicios as $servicio)
                
                <label class="btn ">
                    <input type="radio" name="shuffle-filter" value="{{ $servicio->id }}" />{{ $servicio->nombre}}
                </label>
                @endforeach
                
               
            </div>
        </div>

        <div class="row shuffle-wrapper portfolio-gallery">
            @foreach($testimonios as $testimonio)
            <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item photo" data-groups="{{ $testimonio->tratamientos }}" style="border-radius: 10px;">
                <div class="position-relative doctor-inner-box li">
                    <a href="{{ route('testimonios_detail',$testimonio->id) }}" class="doctor-profile">
                        <div class="doctor-img figure">
                            <img src="{{ $testimonio->url_imagen ?? ''}}" alt="img-{{ $testimonio->nombre }}" class="img-fluid w-100" style="border-radius: 10px;">
                             <figcaption>
                                <p>Ver <br> testimonio <br> +</p>
                            </figcaption>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
          
        </div>
    </div>
</section>
@endsection