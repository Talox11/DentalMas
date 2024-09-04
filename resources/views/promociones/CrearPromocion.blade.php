@extends('layouts.master')

@section('title') Agregar Promocion @endsection

@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Descuentos @endslot
@slot('title') Promociones/Cupones @endslot
@endcomponent

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Administracion de Cupones</h4>
                <p class="card-title-desc">Completa los siguientes campos:</p>

                <form  class="form-content" id="creacion" action="{{ route('guardarPromocion') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="control-label">Tipo Promocion</label>
                            <select name="tipopromocion" class="form-select">
                                <option selected disabled>Selecciona una opcion</option>
                                <option value="porcentaje">Porcentaje %</option>
                                <option value="precio">Precio $</option>
                            </select>

                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metatitle">Codigo del Cupón</label>
                                <input id="codigocupon" name="codigocupon" type="text" class="form-control" placeholder="Codigo Cupon">
                            </div>

                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metakeywords">Vigencia</label>
                                <div class="form-group row mb-6">
                                    <div class="col-lg-12">
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="form-control" placeholder="Fecha Inicio" name="start" />
                                            <input type="text" class="form-control" placeholder="Fecha Fin" name="end" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metakeywords">Inversion Inicial</label>
                                <input id="inversionini" name="inversionini" type="number" step="0.01" class="form-control" placeholder="$">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="metadescription">Descuento por cupon</label>
                                <input id="descuentocupon" name="descuentocupon" type="number" step="0.01" class="form-control" placeholder="$">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="metadescription">Valido Hasta:</label>
                            <div class="docs-toggles">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" id="container" name="chkVigencia" type="checkbox" name="container">
                                            <label class="form-check-label" for="container">Cumplir Vigencia</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" id="trigger" name="chkAgotarExistencia" type="checkbox" name="trigger">
                                            <label class="form-check-label" for="trigger">Agotar Existencias</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="metadescription">Valido En:</label>
                            <div class="docs-toggles">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" id="" name="chkTodo" type="checkbox" name="">
                                            <label class="form-check-label" for="">Toda la republica</label>
                                        </div>
                                    </li>
                                    @foreach($sucursales as $sucursal)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" id="suc{{$sucursal->id}}" name="chkSucursal{{$sucursal->id}}" type="checkbox" >
                                            <label class="form-check-label" for="suc{{$sucursal->id}}">{{ $sucursal->ciudad}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="productdesc">Terminos y condiciones del descuento</label>
                                <textarea class="form-control" name="terminosdesc" id="terminosdesc" rows="5" placeholder="Descripcion"></textarea>
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
@endsection