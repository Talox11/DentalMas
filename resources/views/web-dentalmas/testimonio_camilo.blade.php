@extends('web-dentalmas.index')
@section('contenido')
<section class="page-title bg-1" style="background-image: url( 'assets/images/dentalmas-custom/cliente_3.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Testimonio de </span>
                    <h1 class="text-capitalize mb-5 text-lg">Camillo James</h1>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="section-title">
                    <p class="text-primary text-uppercase fw-bold mb-3">Testimonio</p>
                    <div class="divider my-4"></div>
                    <h1>LA HISTORIA CLÍNICA DE NUESTRO PACIENTE: Camillo</h1>
                    <p>
                    <p>Camillo llegó a Dental Mas porque no estaba contento con su sonrisa. Si bien había llevado ortodoncia con anterioridad, presentaba problemas de oclusión y la ausencia del incisivo lateral superior derecho.</p>
                    
                    </p>
                    <a href="https://www.softwaredentalink.com/" class="btn btn-main-2 btn-round-full mt-3">Haz una cita<i class="icofont-simple-right ml-2  "></i></a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="has-video-popup position-relative">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/rwQHZit1MVw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade rounded overflow-hidden" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="text-center p-3">
                <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9 rounded-bottom overflow-hidden">
                    <iframe src="" id="showVideo" allowscriptaccess="always" allow="autoplay" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="section doctor-qualification gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h3>Tratamientos realizados</h3>
                    <div class="divider my-4"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="edu-block mb-5">
                    <h4 class="mb-3 title-color">Ortodoncia con alineadores transparentes Invisalign</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia, soluta maxime
                        porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error nesciunt temporibus! Vel quod,
                        dolor aliquam!</p>
                </div>

                <div class="edu-block">
                    <h4 class="mb-3 title-color">Colocación de implante dental unitario</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia, soluta maxime
                        porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error nesciunt temporibus! Vel quod,
                        dolor aliquam!</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="edu-block mb-5">
                    <h4 class="mb-3 title-color">Blanqueamiento Dental</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia, soluta maxime
                        porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error nesciunt temporibus! Vel quod,
                        dolor aliquam!</p>
                </div>

                <div class="edu-block">
                    <h4 class="mb-3 title-color">Ortodoncia</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi doloremque harum, mollitia, soluta maxime
                        porro veritatis fuga autem impedit corrupti aperiam sint, architecto, error nesciunt temporibus! Vel quod,
                        dolor aliquam!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section ">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3 counter" data-count="1000000">0</span>k
                        <p>Clientes satisfechos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-flag"></i>
                        <span class="h3 counter" data-count="1200">0</span>+
                        <p>Horas de capacitación</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-badge"></i>
                        <span class="h3 counter" data-count="5">0</span>+
                        <p>Años de experiencioa</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-globe"></i>
                        <span class="h3 counter" data-count="10">0</span>
                        <p>Sucursales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section about">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-4">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color">¿Quieres tener una sonrisa<br>igual de perfecta?</h2>
                    <p class="mt-4 mb-5">Haz tu primera cita con nosotros en algunas de nuestras sucursales</p>

                    <a href="service.html" class="btn btn-main-2 btn-round-full btn-icon">Sucursales<i class="icofont-simple-right ml-3"></i></a>
                </div>
            </div>
            <div class="col-lg-8 col-sm-6">
                <div class="about-img mt-4 mt-lg-0">
                    <img src="assets/images/dentalmas-custom/bg_2.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection