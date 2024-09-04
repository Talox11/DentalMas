@extends('web-dentalmas.index')
@section('contenido')
<section class="banner" style="background-image: url('/assets/images/dentalmas-custom/banner/Banner1728x824_32.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>

                    <h1 class="mb-3 mt-3">Limpieza Dental </h1>

                    <p class="mb-4 pr-5 text-red">Cada uno de nosotros tiene un sonrisa bella y unica, es por eso que necesitas lucirla</p>
                    <div class="btn-container ">
                        <a href="{{ route('pago_servicio') }}" target="" class="btn btn-main-2 btn-icon btn-round-full">Solicitar<i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section case-study">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="case-study-content text-center mb-5">
                    <h2 class="mb-4 text-red">Manten tu sonrisa <br>brillante y limpia </h2>
                    <p></p>
                </div>
            </div>
        </div>



        <div class="case-timeline">
            <div class="case-timeline-divider"></div>
            <div class="case-timeline-dot"></div>

            <div class="row align-items-center">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">¿Que es una limpieza ultrasonica?</h4>
                        <p>Es la eliminacion de placa dentobacteriana y sarro de las superficies dentales</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="case-timeline">
            <div class="case-timeline-divider"></div>
            <div class="case-timeline-dot"></div>
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">¿Para qué sirve?</h4>
                        <p>Para prevenir y/o tratar enfermedades en las encías y dientes, ya que al eliminar l placa dentrobacteriana disminuye la probalidada de infecciones como las caries y la gingivitis</p>
                    </div>
                </div>
                <div class="col-lg-6  order-1 order-lg-2">

                </div>
            </div>
        </div>

        <div class="case-timeline">
            <div class="case-timeline-divider"></div>
            <div class="case-timeline-dot"></div>

            <div class="row align-items-center">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">Beneficios</h4>
                        <p>- Control y prevencion de enfermedades tales como la gingivitis</p>
                        <p>- Conocimiento del correcto cepillado y uso del hilo dental que es explicado en la cita</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="case-timeline">
            <div class="case-timeline-divider"></div>
            <div class="case-timeline-dot"></div>

            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">¿En que consiste la limpieza ultrasónica?</h4>
                        <p>Uso de aparatos ultrasonicos e instrumentos manuales que ayudan a la eliminacion de sarro y placa dentrobacteriana</p>
                    </div>
                </div>

                <div class="col-lg-6  order-1 order-lg-2">

                </div>
            </div>
        </div>
        <div class="case-timeline">
            <div class="case-timeline-divider"></div>
            <div class="case-timeline-dot"></div>

            <div class="row align-items-center">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">Entregables</h4>
                        <p>- Receta médica en caso de ser requerida</p>
                        <p>- Orden radiografica en caso de ser requerida</p>
                        <p>- Técnica de cepillado por escrito</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="case-timeline">
            <div class="case-timeline-divider"></div>
            <div class="case-timeline-dot"></div>

            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">Indicaciones</h4>
                        <p><strong>¿Como debo acudir?</strong></p>
                        <p>- Con los dientes cepillados</p>
                        <p><strong>¿Que debo presentar?</strong></p>
                        <p>- Identificaion oficial</p>
                        <p>- Tutor en caso de ser menor de edad</p>
                    </div>
                </div>

                <div class="col-lg-6  order-1 order-lg-2">

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section service" style="padding:0 !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="heading">
                    <h2 class="mb-4 text-red">Preguntas Frecuentes<br>Faq's</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section case-study" style="padding:0 !important;">
    <div class="container">
        <div class="case-timeline">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">¿La limpieza ultrasónica duele?</h4>
                        <p>No ocasiona ningun tupo de dolor</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">¿Cuanto tiempo dura la limpieza ultrasonica?</h4>
                        <p>Aproximandamente las sesiones duran de 30 a 50 minutos</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="case-timeline">

            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="case-content">
                        <h4 class="mb-3 text-red">¿Podre comer despues de la limpieza ultrasónica?</h4>
                        <p>Si, usted prodra disfrutar de sus alimentos sin ningun problema</p>
                    </div>
                </div>
                <div class="col-lg-6  order-1 order-lg-2">

                </div>
            </div>
        </div>
    </div>
</section>
@endsection