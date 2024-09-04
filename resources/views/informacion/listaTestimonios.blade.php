@extends('layouts.master')

@section('title') Promociones @endsection

@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Promociones @endslot
@slot('title') Lista de promociones/cupones @endslot
@endcomponent
@if (session()->has('message'))
<div class="alert {{session('alert')}} alert-dismissible fade show" role="alert">
    {{session('message')}}
    {{session()->forget('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">

    @foreach ($testimonios as $testimonio)
    <div class="col-xl-6 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">{{ $testimonio->nombre }} </a></h5>
                        <p class="text-muted mb-4">
                            {{ $testimonio->titulo }}

                        </p>
                        <p class="text-muted mb-4">
                            {{ $testimonio->descripcion }}
                        </p>

                    </div>
                </div>
            </div>
            <div class="px-4 py-3 border-top">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-3">
                        <span class="badge "></span>
                    </li>
                    <li class="list-inline-item me-6">
                        <i class="bx bx-calendar me-1"></i> Fecha {{ $testimonio->fecha }}
                    </li>
                    <li class="list-inline-item me-2">
                        <a onclick="getData('{{$testimonio->id}} ')" data-bs-toggle="modal" data-bs-target=".update-promo"><i class="bx bx-pencil"></i> Ver mas</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- end row -->
<!--  update-promo example -->
<div class="modal fade update-promo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Ver/Editar Informacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-content" id="creacion" action="{{ route('updateTestimonio') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="productname">Nombre del cliente</label>
                                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre del cliente">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price">Fecha del testimonio</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" id="fecha_testimonio" name="fecha" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price">Url video</label>
                                        <input id="url_video" name="url_video" type="text" class="form-control" placeholder="Url">
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Tratamientos Realizados</label>

                                            <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Selecciona los tratamientos" name="tratamientos[]">
                                                @foreach($tratamientos as $tratamiento)
                                                <option value="{{ $tratamiento->id }}">{{ $tratamiento->nombre }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="productname">Titulo del testimonio</label>
                                        <input id="titulo" name="titulo" type="text" class="form-control" placeholder="Product Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productdesc">Testimonio:</label>
                                        <textarea class="form-control" name="testimonio" id="testimonio" rows="5" placeholder="Testimonio"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Seleccionar imagen</label>
                            <input onchange="loadFile(event)" type="file" name="imagen" id="file-1" class="inputfile2 @error('archivo')  is-invalid @enderror" data-multiple-caption="{count} files selected" />
                            <img id="output" style="max-width:100%;" />
                            <input type="text" name="old_id_img" id="old_id_img" hidden>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a onclick="update()" type="submit" class="btn btn-primary waves-effect waves-light">Guardas Cambios</a>
                        <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>


<!-- form advanced init -->
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>

<script>
    var idTestimonio = 0;

    function getData(id) {

        $.ajax({
            url: "/testimonio-detail",
            type: 'post',
            data: {
                idTestimonio: id,
                '_token': '{{ csrf_token() }}',
            },
            success: function(data) {

                idTestimonio = id;
                console.log(data);
                $('#nombre').val(data.nombre)
                $('#fecha_testimonio').val(data.fecha)
                $('#url_video').val(data.url_video)
                $('#titulo').val(data.titulo)
                $('#testimonio').val(data.descripcion)
                $('#old_id_img').val(data.id_imagen)
                var img_preview = document.getElementById('output');
                var id_img = document.getElementById('old_id_img');
                if (data.url_imagen) {
                    img_preview.src = data.url_imagen;
                    id_img.src = data.id_imagen
                } else {
                    img_preview.src = '';
                    id_img.src = ''
                }

            }
        });
    }

    function update() {
        var $form = $("#creacion");
            $form.append("<input type='hidden' name='idTestimonio' value='" + idTestimonio + "'/>");
            $('#creacion').submit();
        
    }
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection