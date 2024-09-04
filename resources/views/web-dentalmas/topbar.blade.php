<header class="navigation fixed-top "> 
    <nav class="navbar navbar-expand-lg navigation " id="navbar">
        <div class="container container-adjustment">
            <div class="row">
                <div class="topbar-btn">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icofont-navigation-menu"></span>
                    </button>
                </div>
                <div class="topbar-icon">
                    <a class="navbar-brand" href="/">
                        <img src="/assets/images/dmLogo/LogoDental1.png" alt="" class="img-fluid top-logo">
                    </a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('web-servicios') }}">Tratamientos</a></li>
                    <li class="nav-item"><a class="nav-link adjustment-casos" href="{{ route('testimonios') }}">Casos Reales</a></li>
                    @if(Auth::check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('serviciosLista') }}">Panel</a></li>
                    @endif
                </ul>
                <ul class="ml-lg-auto list-unstyled m-0">
                    <li><a data-toggle="modal" data-target="#modalagenda" class="btn btn-red btn-circled">Agendar</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- se agregan las clases sticky-header tanto en la etiquerta header como en la etiqueta nav -->