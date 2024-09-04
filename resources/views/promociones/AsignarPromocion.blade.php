@extends('layouts.master')

@section('title') Asignar Promocion @endsection

@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Descuentos @endslot
@slot('title') Asignar Cupones @endslot
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

                <h4 class="card-title">Asignar promocion</h4>
                <p class="card-title-desc"> Asigna el descuento a los servicios que deseas:</p>

                <form class="form-content" id="creacion" action="{{ route('storeAsignarPromocion') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="control-label">Servicio</label>
                            <select name="servicio" id="idservicio" class="form-select">
                                <option selected disabled>Selecciona una opcion</option>
                                @foreach($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="col-sm-3">
                            <label for="metadescription">Selecciona el/los cupones que deseas agregar al servicio:</label>
                            <div class="docs-toggles">
                                <ul class="list-group">
                                    @foreach($promociones as $promocion)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" id="promo-{{$promocion->id}}" name="{{ $promocion->id }}" type="checkbox">
                                            <label class="form-check-label" for="promo-{{$promocion->id}}">{{ $promocion->codigo }}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Seleccionar imagen</label>
                                <input onchange="loadFile(event)" type="file" name="imagen" id="file-1" class="inputfile2 @error('archivo')  is-invalid @enderror" data-multiple-caption="{count} files selected" />
                                <img id="output" style="max-width:100%; max-height:70%;" />
                                <input type="text" name="old_id_img" id="old_id_img" hidden>
                            </div>
                        </div>

                    </div>

                    <br>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                        <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- select 2 plugin -->
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

<!-- dropzone plugin -->
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/ecommerce-select2.init.js') }}"></script>

<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script>
    $('#idpromocion').on('change', function() {
        $.ajax({
            url: "/promo-servicio-detail/" + this.value,
            type: 'POST',
            data: {
                'idPromocion': this.value,
                '_token': '{{ csrf_token() }}',
            },
            success: function(response) {
                response.forEach(function(item, index, object) {
                    $('#promo-' + item.id_servicios).prop('checked', true);
                });

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
@endsection