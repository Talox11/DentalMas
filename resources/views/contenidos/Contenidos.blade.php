@extends('layouts.master')

@section('title') @lang('translation.Form_Layouts') @endsection
@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Contenidos @endslot
@slot('title') Contenidos Paginas @endslot
@endcomponent

@if (session()->has('message'))
<div class="alert {{session('alert')}} alert-dismissible fade show" role="alert">
    {{session('message')}}
    {{session()->forget('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Contenido paginas principales</h4>

                <form action="{{ route('updatePaginas') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="id_banner" class="form-label">Banner</label>
                                    <select id="id_banner" class="form-select" name="id_banner">
                                        <option selected disabled>Seleccione una opcion</option>
                                        @foreach($paginas as $pagina)
                                        <option value="{{ $pagina->id }}" }}>{{ $pagina->tipo }}</option>
                                        @endforeach
                                    </select>
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
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Introduzca el titulo que se mostrara sobre el banner">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="subtitulo" class="form-label">Subtitulo</label>
                                <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Introduzca el subtitulo que se mostrara sobre el banner">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="detalles" class="form-label">Detalles</label>
                                <input type="text" class="form-control" id="detalles" name="detalles" placeholder="Introduzca el subtitulo que se mostrara sobre el banner">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Guardar</button>
                        </div>

                    </div>
                </form>
            </div>



        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $('#id_banner').on('change', function() {
        $.ajax({
            url: "/getInfo-pagina/" + this.value,
            type: 'GET',
            data: this.value,
            success: function(res) {
                console.log(res);
                $('#titulo').val(res.titulo)
                $('#subtitulo').val(res.subtitulo)
                $('#detalles').val(res.detalles)
                $('#old_id_img').val(res.id_imagen)
                var img_preview = document.getElementById('output');
                var id_img = document.getElementById('old_id_img');
                if (res.url_imagen) {
                    img_preview.src = res.url_imagen;
                    id_img.src = res.id_imagen
                }else{
                    img_preview.src = '';
                    id_img.src = ''
                }

            }
        });
    });

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>


<!-- select 2 plugin -->
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

<!-- dropzone plugin -->
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/ecommerce-select2.init.js') }}"></script>
@endsection