@extends('layouts.master')

@section('title') @lang('translation.Form_Layouts') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Informacion @endslot
@slot('title') Registrar Sucursal @endslot
@endcomponent

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">


                <p class="card-title-desc">Completa los siguientes campos:</p>

                <form class="form-content" id="creacion" action="{{ route('storeSucursal') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metatitle">Ciudad</label>
                                <input id="ciudad" name="ciudad" type="text" class="form-control" placeholder="Ciudad">
                            </div>

                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metatitle">Direccion</label>
                                <input id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metatitle">Telefono</label>
                                <input id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metatitle">Celular</label>
                                <input id="celular" name="celular" type="text" class="form-control" placeholder="Celular">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-6">
                                <label for="metatitle">Link Google Maps</label>
                                <input id="link_maps" name="link_maps" type="text" class="form-control" placeholder="Link Google">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <label for="metatitle">Horarios de antencion</label>
                                <div class="row mb-3" id="repeater-horario">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <select name="dia_inicio[]" class="form-select">
                                                <option value="Lunes" selected>Lunes</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <select name="dia_final[]" class="form-select">
                                                <option value="Lunes" selected>Lunes</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3  col-md-3  col-lg-3 ">
                                            <input class="form-control" type="time" value="12:00:00" id="example-time-input" name="hora_inicio[]">
                                        </div>

                                        <div class="col-sm-3  col-md-3  col-lg-3 ">
                                            <input class="form-control" type="time" value="12:00:00" id="example-time-input" name="hora_final[]">
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3  col-md-3  col-lg-3 ">
                                    <a onclick="addHorario()" class="btn btn-primary"> <i class="bx bx-plus-medical"></i></a>

                                </div>
                                <div class="col-sm-3  col-md-3  col-lg-3 ">
                                    <a onclick="eliminarHorario(this)" class="btn btn-danger"> <i class="bx bx-trash-alt"></i></a>

                                </div>
                            </div>
                        </div>






                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="control-label">Activo</label>
                                <div class="col-lg-6">
                                    <div class="mt-4 mt-lg-0">
                                        <div class="d-flex">
                                            <div class="square-switch">
                                                <input type="checkbox" id="square-switch3" name="active" switch="bool" checked />
                                                <label for="square-switch3" data-on-label="Yes" data-off-label="No"></label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                        <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection
@section('script')
<script>
    function addHorario() {
        var nuevoHorario = $(
            '<div class="row">' +
            '<br><br>'+
            '<div class="col-sm-3 col-md-3 col-lg-3">' +
            '<select name="dia_inicio[]" class="form-select">' +
            '<option value="Lunes" selected>Lunes</option>' +
            '<option value="Martes">Martes</option>' +
            '<option value="Miercoles">Miercoles</option>' +
            '<option value="Jueves">Jueves</option>' +
            '<option value="Viernes">Viernes</option>' +
            '<option value="Sabado">Sabado</option>' +
            '<option value="Domingo">Domingo</option>' +
            '</select>' +
            '</div>' +
            '<div class="col-sm-3 col-md-3 col-lg-3">' +
            '<select name="dia_final[]" class="form-select">' +
            '<option value="Lunes" selected>Lunes</option>' +
            '<option value="Martes">Martes</option>' +
            '<option value="Miercoles">Miercoles</option>' +
            '<option value="Jueves">Jueves</option>' +
            '<option value="Viernes">Viernes</option>' +
            '<option value="Sabado">Sabado</option>' +
            '<option value="Domingo">Domingo</option>' +
            '</select>' +
            '</div>' +
            '<div class="col-sm-3  col-md-3  col-lg-3 ">' +
            '<input class="form-control" type="time" value="12:00:00" id="example-time-input" name="hora_inicio[]">' +
            '</div>' +

            '<div class="col-sm-3  col-md-3  col-lg-3 ">' +
            '<input class="form-control" type="time" value="12:00:00" id="example-time-input" name="hora_final[]">' +
            '</div>'+
            '</div>'
        );

        $('#repeater-horario').append(nuevoHorario);

    }

    function eliminarHorario(btnEliminar) {

        var divParent = $('#repeater-horario').children().last() //+
        console.log(divParent);
        $(divParent).remove();
    }
</script>
@endsection