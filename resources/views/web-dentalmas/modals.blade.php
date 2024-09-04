<div class="modal fade" id="modalagenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">

            <div class="modal-body bg-3">

                <header id="page-topbar">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">Cerrar &times;</span>
                                </button>
                            </div>



                        </div>

                        <div class="d-flex">

                            <div class="dropdown d-inline-block d-lg-none ms-2">
                                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="@lang('translation.Search')" aria-label="Search input">

                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>s
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"></span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->

                                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal" data-bs-target=".change-password"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Cambiar contraseña</span></a>

                                    <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Cerrar Sesion</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </header>
                <div class="px-3 to-front">
                    <div class="row align-items-center">
                        <div class="col text-right">
                            <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><span class="icon-close2"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 to-front">
                    <div class="text-center">
                        <div class="logo">
                            <img src="/assets/images/dentalmas-custom/LogoDental2.png" alt="Image" class="img-fluid " style="width: 20%;">
                        </div>
                        <h3>Escoge tu opcion de acuerdo a tu ubicacion</h3>
                        <p class="mb-4">Tenemos 10 sucursales en toda la republica mexicana, escoge la opcion mas cercana a tu ubicacion</p>
                        <form action="#" class="mb-4">

                            <div class="row">
                                <div class="col-6">
                                    <a href="https://35dd767addca2ec45da4596d4e1465c8e555dc5e.agenda.softwaredentalink.com/agendas/agendaExpress" class="btn btn-primary btn-red btn-block">Agenda Plataforma del Norte</a>
                                    <p>Crea tu Cita para León y Mexicali</p>
                                </div>
                                <div class="col-6">
                                    <a href="https://17dea939a6cb2907e6291c294c7a15306cf97d93.agenda.softwaredentalink.com/agendas/agendaExpress" class="btn btn-primary  btn-red btn-block">Agenda Plataforma del Sur</a>
                                    <p>Crea tu Cita para Guadalajara, Pachuca, Villahermosa, Comitán, San Cristobal, Tonalá, Tuxtla Gutierrez y Tapachula</p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade " id="modal-testimonio-yt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered yt-modal-responsive" role="document">
        <div class="modal-content rounded-0 no-color-bg">

            <div class="modal-body bg-3">

                <header id="page-topbar">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <div class="navbar-brand-box">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">Cerrar &times;</span>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex">

                        </div>
                    </div>
                </header>
                <div class="p-4 to-front yt-modal">
                    <div class="text-center">
                        <div class="has-video-popup position-relative">
                            <iframe width="860" height="415" src="https://www.youtube.com/embed/xikBqm7R8aI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-sucursal-promo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">

            <div class="modal-body bg-3">

                <header id="page-topbar">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">Cerrar &times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="px-3 to-front">
                    <div class="row align-items-center">
                        <div class="col text-right">
                            <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><span class="icon-close2"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 to-front">
                    <div class="text-center">
                        <div class="logo">
                            <img src="/assets/images/dentalmas-custom/LogoDental2.png" alt="Image" class="img-fluid " style="width: 20%;">
                        </div>
                        <h3>Escoge tu sucursal </h3>
                        <p class="mb-4">Tenemos 10 sucursales en toda la republica mexicana, escoge la opcion mas cercana a tu ubicacion</p>


                        <select name="" class="form-control" id="redirect-sucursales">
                            <?php
                            use App\Models\Sucursal;
                            $sucursales = Sucursal::toBase()->where('estatus', 1)->get(); ?>
                            <option value="" disabled selected>Selecciona una sucursal</option>
                            @foreach($sucursales as $sucursal)
                            <option value="{{ $sucursal->ciudad }}">{{ $sucursal->ciudad }} </option>
                            @endforeach
                        </select>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>