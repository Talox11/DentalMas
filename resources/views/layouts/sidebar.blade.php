<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-apps">Panel</li>

                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Dental Mas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('serviciosLista') }}" key="t-products">Servicios</a></li>
                        <li><a href="{{ route('crearServicio') }}" key="t-add-product">Agregar Servicio</a>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-tags"></i>
                        <span key="descuentos">Descuentos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('promocionesLista') }}" key="t-buy">Lista de Promociones/Descuentos</a></li>
                        <li><a href="{{ route('crearPromocion') }}" key="t-wallet">Crear Promocion/Descuento</a></li>
                        <li><a href="{{ route('asignarPromocion') }}" key="t-buy">Asignar Promociones</a></li>
                        <li><a href="{{ route('asignarPromocionSucursal') }}" key="t-buy">Crear Promocion a Sucursal</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span key="paginas">Paginas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('editarPagina') }}" key="t-wallet">Modificar paginas</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span key="Informacion">Informacion</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('listaFAQs') }}" key="t-wallet">Lista FAQs</a></li>
                        <li><a href="{{ route('crearFAQs') }}" key="t-wallet">Registrar FAQs</a></li>
                        <li><a href="{{ route('lista_testimonios') }}" key="t-wallet">Lista de Testimonios</a></li>
                        <li><a href="{{ route('crearTestimonios') }}" key="t-wallet">Registrar Testimonios</a></li>
                        <li><a href="{{ route('lista_sucursales') }}" key="t-wallet">Lista Sucursales</a></li>
                        <li><a href="{{ route('crearSucursal') }}" key="t-wallet">Registrar Sucursal</a></li>
                    </ul>
                </li>

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->