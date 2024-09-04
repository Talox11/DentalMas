@extends('layouts.master')

@section('title') @lang('translation.Form_Layouts') @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />


@section('content')

@component('components.breadcrumb')
@slot('li_1') Informacion @endslot
@slot('title') Testimonios @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Testimonios</h4>
                <p class="card-title-desc">Rellena la informacion a continuacion</p>

                <form class="form-content" id="creacion" action="{{ route('storeTestimonios') }}" method="POST" enctype="multipart/form-data">
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
                                            <input type="text" name="fecha" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">

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

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Seleccionar imagen</label>
                                    <input onchange="loadFile(event)" type="file" name="imagen" id="file-1" class="inputfile2 @error('archivo')  is-invalid @enderror" data-multiple-caption="{count} files selected" />
                                    <img id="output" style="max-width:100%;" />
                                    <input type="text" name="old_id_img" id="old_id_img" hidden>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                <!-- <a type="button" id="submit" class="btn btn-primary waves-effect waves-light" onclick="submit()">Guardar</a> -->
                                <button type="button" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>



    </div>
</div>




@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>


<!-- form advanced init -->
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>

<script>


    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection