@extends('layouts.master')

@section('title') @lang('translation.Form_Layouts') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Informacion @endslot
@slot('title') Lista Sucursales @endslot
@endcomponent
@if (session()->has('message'))
<div class="alert {{session('alert')}} alert-dismissible fade show" role="alert">
    {{session('message')}}
    {{session()->forget('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="section service gray-bg" style="padding:0 !important;">
    <div class="row">
        @foreach($sucursales as $sucursal)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="service-item mb-4">

                <a onclick="getData('{{ $sucursal->id }}')" data-bs-toggle="modal" data-bs-target=".update-item">
                    <div class="content">
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">{{ $sucursal->ciudad }} </h3>
                            <p>{{ $sucursal->direccion }} </p>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h5 class="heading">Horarios </h5>
                            @if($sucursal->horario  )
                            <?php $horarios = json_decode($sucursal->horario);  ?>
                            @foreach($horarios as $horario)
                            <p>{{ $horario->dia }}</p>
                            @endforeach
                            @endif
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h5 class="heading">Telefonos </h5>
                            <p>Recepcion: {{ $sucursal->telefono }}</p>
                            <p>Whatsapp: {{ $sucursal->celular }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>


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
                        <a onclick="update()" type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</a>
                        
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end row -->
@endsection

@section('script')



<script>
    var idSucursal = 0;

    function getData(id) {
        idSucursal = id

        $.ajax({
            url: "/sucursal-detail",
            type: 'post',
            data: {
                idSucursal: idSucursal,
                '_token': '{{ csrf_token() }}',
            },
            success: function(data) {
                horarios = JSON.parse(data.horario);
                console.log(horarios);
                $("#ciudad").val(data.ciudad);
                $("#direccion").val(data.direccion);
                $("#telefono").val(data.telefono);
                $("#celular").val(data.celular);
                $("#link_maps").val(data.ulr_map);

                if (data.estatus == 1)
                    $('#square-switch3').prop('checked', true);
                else
                    $('#square-switch3').prop('checked', false);
            }
        });
    }

    function update() {
       
        
        $.ajax({
            url: "/update-sucursal/" + idSucursal,
            type: 'post',
            data: {
                idSucursal: idSucursal,
                '_token': '{{ csrf_token() }}',
                'ciudad' : $("#ciudad").val(),
                'direccion' : $("#direccion").val(),
                'telefono' : $("#telefono").val(),
                'celular' : $("#celular").val(),
                'ulr_map' : $("#link_maps").val(),
                'horario' : '',
                'estatus' : $('#square-switch3').is(':checked'),
            },
            success: function(response) {
                window.location = "{{ route('lista_sucursales') }}";
            }
        });
    }

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