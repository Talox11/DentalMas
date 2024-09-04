@extends('layouts.master')

@section('title') @lang('translation.Add_Product') @endsection

@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dental Más @endslot
@slot('title') Registrar Tratamiento @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if(isset($servicio))
                <h1>jejej</h1>
                @endif
                <h4 class="card-title">Informacion Basica</h4>
                <p class="card-title-desc">Rellena la informacion a continuacion</p>

                <form class="form-content custom-validation" id="creacion" action="{{ route('guardarServicio') }}" method="POST" enctype="multipart/form-data">
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
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-4 text-lg col-md-2"></a>

                                </div>
                                <div id="iconos" class="icon d-flex align-items-center">
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-5  text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-6  text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-7  text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-8  text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-9  text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-10 text-lg col-md-2"></a>

                                </div>
                                <div id="iconos" class="icon d-flex align-items-center">
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-11 text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-12 text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-13 text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-14 text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-15 text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-16 text-lg col-md-2"></a>
                                </div>
                                <div id="iconos" class="icon d-flex align-items-center">
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-17 text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-18 text-lg col-md-2"></a>
                                    <a onclick="selectedIcon(this);" class="flaticon-dental-mt-19 text-lg col-md-2"></a>
                                </div>
                            </div>




                        </div>
                    </div>

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

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label class="control-label">DentalLink</label>
                            <select name="dentalink" class="form-select">
                                <option selected disabled>Selecciona una opcion</option>
                                <option value="https://35dd767addca2ec45da4596d4e1465c8e555dc5e.agenda.softwaredentalink.com/agendas/agendaExpress">DentalLink Norte</option>
                                <option value="https://17dea939a6cb2907e6291c294c7a15306cf97d93.agenda.softwaredentalink.com/agendas/agendaExpress">DentalLink Sur</option>
                            </select>

                        </div>
                    </div><br><br>
                    <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Seleccionar imagen</label>
                                <input onchange="loadFile(event)" type="file" name="imagen" id="file-1" class="inputfile2 @error('archivo')  is-invalid @enderror" data-multiple-caption="{count} files selected" />
                                <img id="output" style="max-width:100%; max-height:70%;" />
                                <input type="text" name="old_id_img" id="old_id_img" hidden>
                            </div>
                        </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                        <!-- <a type="button" id="submit" class="btn btn-primary waves-effect waves-light" onclick="submit()">Guardar</a> -->
                        <button type="button" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<script>
    function submit() {
        console.log(document.getElementsByName('contenidos[]'))
        var values = $("input[name='contenidos[]']")
            .map(function() {
                return $(this).val();
            }).get();
        console.log(values);

        console.log($('.inner-repeater mb-3').children());
    }
</script>
<!-- select 2 plugin -->




<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

<!-- form mask -->
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>

<!-- form mask init -->
<script src="{{ URL::asset('/assets/js/pages/form-mask.init.js') }}"></script>

<script type="text/javascript">
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