@extends('layouts.master')

@section('title') @lang('translation.Form_Layouts') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Forms @endslot
@slot('title') Faqs @endslot
@endcomponent


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Completa todo  los campos</h5>
                

                <form action="{{ route('guardarFAQs') }}" method="post" >
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
                                    @foreach($servicios as $servicio)
                                    <option value="servicio-{{$servicio->id}}">{{ $servicio->nombre }} </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Selecciona una categoria</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="respuesta" name ="respuesta" placeholder="Respuesta">
                        <label for="respuesta">Respuesta</label>
                    </div>
                   
                    <div>
                        <button type="submit" class="btn btn-danger w-md">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

   
   
</div>
<!-- end row -->

@endsection