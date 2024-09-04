@extends('layouts.master')

@section('title') @lang('translation.FAQs') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Informacion @endslot
@slot('title') FAQs @endslot
@endcomponent
@if (session()->has('message'))
<div class="alert {{session('alert')}} alert-dismissible fade show" role="alert">
    {{session('message')}}
    {{session()->forget('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="checkout-tabs">
    <div class="row mb-3">
        <div class="col-xl-4 col-sm-6">
            <div class="mt-2">
                <h5>Haz Click en el titulo de una pregunta para editar</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-gen-ques-tab" data-bs-toggle="pill" href="#v-pills-gen-ques" role="tab" aria-controls="v-pills-gen-ques" aria-selected="true">
                    <i class="bx bx-question-mark d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Preguntas Generales</p>
                </a>
                <a class="nav-link" id="v-pills-privacy-tab" data-bs-toggle="pill" href="#v-pills-privacy" role="tab" aria-controls="v-pills-privacy" aria-selected="false">
                    <i class="bx bx-check-shield d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Politicas de privacidad</p>
                </a>
                <a class="nav-link" id="v-pills-support-tab" data-bs-toggle="pill" href="#v-pills-support" role="tab" aria-controls="v-pills-support" aria-selected="false">
                    <i class="bx bx-support d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Soporte Tecnico</p>
                </a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                            <h4 class="card-title mb-5">Preguntas Generales</h4>
                            
                            @foreach ($faqs as $faq)
                            @if($faq->categoria == '1')
                            <div class="faq-box d-flex mb-4">
                                <div class="flex-shrink-0 me-3 faq-icon">
                                    <i class="bx bx-help-circle font-size-20 text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15">{{ $faq->pregunta }}</h5><a onclick="getData('{{ $faq->id }}')" data-bs-toggle="modal" data-bs-target=".update-faq"><i class="bx bx-pencil"></i> Detalles</a>
                                    
                                    <p class="text-muted">{{ $faq->respuesta }}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                           
                        </div>
                        <div class="tab-pane fade" id="v-pills-privacy" role="tabpanel" aria-labelledby="v-pills-privacy-tab">
                            <h4 class="card-title mb-5">Politicas de privacidad</h4>

                            @foreach ($faqs as $faq)
                            @if($faq->categoria == '2')
                            <div class="faq-box d-flex mb-4">
                                <div class="flex-shrink-0 me-3 faq-icon">
                                    <i class="bx bx-help-circle font-size-20 text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15">{{ $faq->pregunta }}</h5><a onclick="getData('{{ $faq->id }}')" data-bs-toggle="modal" data-bs-target=".update-faq"><i class="bx bx-pencil"></i> Detalles</a>
                                    <p class="text-muted">{{ $faq->respuesta }}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="v-pills-support" role="tabpanel" aria-labelledby="v-pills-support-tab">
                            <h4 class="card-title mb-5">Soporte Tecnico</h4>

                            @foreach ($faqs as $faq)
                            @if($faq->categoria == '3')
                            <div class="faq-box d-flex mb-4">
                                <div class="flex-shrink-0 me-3 faq-icon">
                                    <i class="bx bx-help-circle font-size-20 text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15">{{ $faq->pregunta }}</h5><a onclick="getData('{{ $faq->id }}')" data-bs-toggle="modal" data-bs-target=".update-faq"><i class="bx bx-pencil"></i> Detalles</a>
                                    <p class="text-muted">{{ $faq->respuesta }}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<div class="modal fade update-faq" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Ver/Editar Informacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pregunta" name="pregunta" placeholder="Pregunta">
                            <label for="floatingemailInput">Pregunta</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name ="categoria">
                                <option selected disabled>Categoria</option>
                                <option value="1">Preguntas Generales</option>
                                <option value="2">Politicas de Privacidad</option>
                                <option value="3">Soporte Tecnico</option>
                            </select>
                            <label for="floatingSelectGrid">Selecciona una categoria</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="respuesta" name ="respuesta" placeholder="Respuesta">
                    <label for="respuesta">Respuesta</label>
                </div>

                <div class="col-sm-3">
                    <div class="mb-3">
                        <label class="control-label">Activo</label>
                        <div class="col-lg-6">
                            <div class="mt-4 mt-lg-0">
                                <div class="d-flex">
                                    <div class="square-switch">
                                        <input type="checkbox" id="faq-active" name="active" switch="bool"  />
                                        <label for="faq-active" data-on-label="Yes" data-off-label="No"></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a onclick="update()" type="submit" class="btn btn-primary waves-effect waves-light">Guardas Cambios</a>
                    <button type="" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
@section('script')
<script>
    var idFaq = 0;
    function getData(id) {
        idServicio = id
        $.ajax({
            url: "/faq-detail",
            type: 'post',
            data: {
                idFaq: id,
                '_token': '{{ csrf_token() }}',
            },
            success: function(data) {
                idFaq = id;
                console.log(data);
                $('#pregunta').val(data.pregunta);
                $('#floatingSelectGrid').val(data.categoria).prop('selected', true);
                $('#respuesta').val(data.respuesta);
                
                
                $('#faq-active').prop('checked', false);
                if (data.estatus == 1)
                    $('#faq-active').prop('checked', true);
            }
        });
    }

    function update() {

        $.ajax({
            url: "/update-FAQs/" + idFaq,
            type: 'post',
            data: {
                'idFaq': idFaq,
                '_token': '{{ csrf_token() }}',
                'pregunta': $('#pregunta').val(),
                'respuesta': $('#respuesta').val(),
                'categoria': $('#floatingSelectGrid').val(),
                'active': $('#faq-active').is(':checked'),
                
            },
            success: function(response) {
                window.location = "{{ route('listaFAQs') }}";
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