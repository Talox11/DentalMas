@extends('layouts.master')

@section('title') Servicios @endsection

@section('css')
<!-- ION Slider -->
<link href="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dental Mas @endslot
@slot('title') Servicios @endslot
@endcomponent
@if (session()->has('message'))
<div class="alert {{session('alert')}} alert-dismissible fade show" role="alert">
    {{session('message')}}
    {{session()->forget('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6">
                <div class="mt-2">
                    <h5>Listado de servicios</h5>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($servicios as $servicio)

            <div class="col-sm-3 col-md-3 col-xl-3 ">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img position-relative">
                            <div class="avatar-sm product-ribbon">

                            </div>
                            <div class="icon d-flex align-items-center">
                                <i class="{{$servicio->icono}} text-lg"></i>
                                <h4 class="mt-3 mb-3">{{ $servicio->nombre }}</h4>
                            </div>
                        </div>
                        <div class="mt-4 text-center">



                            <h5 class="my-0"><span class="text-muted me-2"></span> <b>$ {{ $servicio->precio_base }}</b></h5>

                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a onclick="getData('{{ $servicio->id }}')" data-bs-toggle="modal" data-bs-target=".update-item" class="text-dark">Detalles </a></h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end row -->
</div>


<!--  update-item example -->
<div class="modal fade update-item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Ver/Editar Informacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-content " id="creacion">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="productname">Nombre del Tratamiento</label>
                                <input id="productname" name="productname" type="text" class="form-control" placeholder="Nombre del tratamiento" required>
                            </div>

                            <div class="mb-3">
                                <label for="productdesc">Descripcion del Tratamiento</label>
                                <textarea class="form-control" name="productdesc" id="productdesc" rows="4" placeholder="Descripcion del tratamienti"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="consiste_tratamiento">¿En que consiste el Tratamiento?</label>
                                <textarea class="form-control" name="consiste_tratamiento" id="consiste_tratamiento" rows="4" placeholder="Descripcion del tratamienti"></textarea>
                            </div>


                            <div class="inner-repeater mb-3">
                                <div id="repeater-entregables" class="inner mb-3">
                                    <label>Entregables:</label>
                                    <div class="inner mb-3 row">
                                        <div class="col-md-8 col-8">
                                            <input type="text" class="inner form-control" required placeholder="Entregables del Tratamiento" name="entregables[]" />
                                        </div>
                                        <div class="col-md-2 col-4">
                                            <div class="d-grid">
                                                <input type="button" class="btn btn-primary inner" onclick="eliminarEntregables(this)" value="Eliminar" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" class="btn btn-success inner" onclick="agregarEntregables()" value="Añadir Contenido" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="price">Precio</label>
                                <input id="input-currency" name="price" placeholder="$0.00" class="form-control input-mask text-start" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" required>

                            </div>

                            <div class="mb-3">
                                <label for="tratamiento_sirve">¿Para qué sirve?</label>
                                <textarea class="form-control" name="tratamiento_sirve" id="tratamiento_sirve" rows="4" placeholder="Para que sirve"></textarea>
                            </div>

                            <div class="mb-3">
                                <input type="text" hidden name="icon" id="icono">
                                <label for="descripcion">Selecciona un icono</label>
                                <div id="iconos" class="icon d-flex align-items-center">
                                    <a onclick="selectedIcon(this);" class="flaticon-tooth-1  text-lg col-sm-6 col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-tooth-with-braces  text-lg col-sm-6 col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-tooth  text-lg col-sm-6 col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-care-1  text-lg col-sm-6 col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-care  text-lg col-md-2"></a>
                                </div>

                            </div>


                            <div class="inner-repeater mb-3">
                                <div id="repeater-beneficios" class="inner mb-3">
                                    <label>Beneficios:</label>
                                    <div class="inner mb-3 row">
                                        <div class="col-md-8 col-8">
                                            <input type="text" class="inner form-control" required placeholder="Beneficios del Tratamiento" name="beneficios[]" />
                                        </div>
                                        <div class="col-md-2 col-4">
                                            <div class="d-grid">
                                                <input type="button" class="btn btn-primary inner" onclick="eliminarBeneficio(this)" value="Eliminar" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <input type="button" class="btn btn-success inner" onclick="agregarBeneficio()" value="Añadir Beneficio" />
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label class="control-label">DentalLink</label>
                            <select name="dentalink" id="dentalink_opc" class="form-select">
                                <option selected disabled>Selecciona una opcion</option>
                                <option value="https://35dd767addca2ec45da4596d4e1465c8e555dc5e.agenda.softwaredentalink.com/agendas/agendaExpress">DentalLink Norte</option>
                                <option value="https://17dea939a6cb2907e6291c294c7a15306cf97d93.agenda.softwaredentalink.com/agendas/agendaExpress">DentalLink Sur</option>
                            </select>

                        </div>
                    </div><br><br>

                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label class="control-label">Activo</label>
                            <div class="col-lg-6">
                                <div class="mt-4 mt-lg-0">
                                    <div class="d-flex">
                                        <div class="square-switch">
                                            <input type="checkbox" id="square-switch3" name="active" switch="bool" checked />
                                            <label for="square-switch3" data-on-label="Si" data-off-label="No"></label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-5">
                        <a onclick="update()" class="btn btn-primary waves-effect waves-light">Guardar Cambios</a>
                        <!-- <a type="button" id="submit" class="btn btn-primary waves-effect waves-light" onclick="submit()">Guardar</a> -->

                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end row -->

@endsection
@section('script')

<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

<!-- form mask -->
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>

<!-- form mask init -->
<script src="{{ URL::asset('/assets/js/pages/form-mask.init.js') }}"></script>

<script>
    var idServicio = 0;
    function getData(id) {
        idServicio = id
        $.ajax({
            url: "/servicio-detail",
            type: 'post',
            data: {
                idServicio: id,
                '_token': '{{ csrf_token() }}',
            },
            success: function(data) {
                
                let contenido = JSON.parse(data.contenido);
                
                $('#productname').val(data.nombre)
                $('#icono').val(contenido.icon)
                $('#input-currency').val(parseInt(data.precio_base))
                $('#productdesc').append(data.descripcion)
                $('#tratamiento_sirve').append(contenido.tratamiento_sirve)
                $('#consiste_tratamiento').append(contenido.consiste_tratamiento)
                $('#dentalink_opc').val(data.url_dentalink).prop('selected', true);

                $("#iconos>a." + contenido.icon).addClass("icon-selected");

                let beneficios = contenido.beneficios
                let entregables = contenido.entregables
                // idd="repeater-entregables"
                beneficios.forEach(function(item, index, object) {
                    let input = $('#repeater-beneficios>div>div').children()[0]
                    let btn = $('#repeater-beneficios>div>div').children()[1]
                    $(input).val(item);

                });
                entregables.forEach(function(item, index, object) {
                    let input = $('#repeater-entregables>div>div').children()[0]
                    let btn = $('#repeater-entregables>div>div').children()[1]
                    $(input).val(item);
                });
                
                $('#square-switch3').prop('checked', false);
                if (data.estatus == 1)
                    $('#square-switch3').prop('checked', true);
            }
        });
    }

    function update() {
        let entregables = []
        let beneficios = []
        $('input[name="entregables[]"]').each(function() {
            entregables.push($(this).val());
        });
        $('input[name="beneficios[]"]').each(function() {
            beneficios.push($(this).val());
        });

        console.log(entregables, beneficios)

        $.ajax({
            url: "/update-servicio/" + idServicio,
            type: 'post',
            data: {
                idServicio: idServicio,
                '_token': '{{ csrf_token() }}',
                'nombre': $('#productname').val(),
                'precio_base': $('#input-currency').val(),
                'descripcion': $('#productdesc').val(),
                'tratamiento_sirve': $('#tratamiento_sirve').val(),
                'consiste_tratamiento': $('#consiste_tratamiento').val(),
                'entregables': entregables,
                'beneficios': beneficios,
                'icon': $('#icono').val(),
                'dentalink': $('#dentalink_opc').val(),
                'active': $('#square-switch3').is(':checked'),
            },
            success: function(response) {
                window.location = "{{ route('serviciosLista') }}";
            }
        });
    }

    function agregarBeneficio() {
        var nuevaPregunta = $(
            '<div class="inner mb-3 row">' +
            '<div class="col-md-8 col-8">' +
            '<input type="text" class="inner form-control" required placeholder="Beneficios del Tratamiento" name="beneficios[]" />' +
            '</div>' +
            '<div class="col-md-2 col-4">' +
            '<div class="d-grid">' +
            '<input type="button" class="btn btn-primary inner" onclick="eliminarBeneficio(this)" value="Eliminar" />' +
            '</div>' +
            '</div>' +

            '</div>'
        );

        $('#repeater-beneficios').append(nuevaPregunta);
    }

    function eliminarBeneficio(btnEliminar) {
        var divParent = $(btnEliminar).parents(':eq(2)')[0]; //
        $(divParent).remove();
    }

    function agregarEntregables() {
        var nuevaPregunta = $(
            '<div class="inner mb-3 row">' +
            '<div class="col-md-8 col-8">' +
            '<input type="text" class="inner form-control" required placeholder="Entregables del Tratamiento" name="entregables[]" />' +
            '</div>' +
            '<div class="col-md-2 col-4">' +
            '<div class="d-grid">' +
            '<input type="button" class="btn btn-primary inner" onclick="eliminarEntregables(this)" value="Eliminar" />' +
            '</div>' +
            '</div>' +
            '</div>'
        );

        $('#repeater-entregables').append(nuevaPregunta);
    }

    function eliminarEntregables(btnEliminar) {
        var divParent = $(btnEliminar).parents(':eq(2)')[0]; //
        $(divParent).remove();
    }

    function selectedIcon(icono) {
        $("#iconos>a.icon-selected").removeClass("icon-selected");
        $(icono).addClass("icon-selected");
        $('#icono').val($(icono).attr('class').split(' ')[0]);

    }
</script>
@endsection