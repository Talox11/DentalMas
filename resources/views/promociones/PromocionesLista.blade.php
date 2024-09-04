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

    @foreach ($promociones as $promocion)
    <div class="col-xl-6 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">{{ $promocion->codigo }}</a></h5>
                        <p class="text-muted mb-4">

                            @if($promocion->tipo == 'porcentaje')
                            {{ $promocion->descuento_cupon }} %
                            @else
                            $ {{ $promocion->descuento_cupon }} MXN
                            @endif
                            de descuento en la compra de servicios seleccionados
                        </p>
                        @if($promocion->chk_vigencia)
                        <p class="text-muted mb-4">
                            Valido del {{ $promocion->inicio }} a {{ $promocion->fin }}
                        </p>
                        @endif
                        @if($promocion->chk_agotar_exist)
                        <p class="text-muted mb-4">
                            Valido hasta agotar existencias
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 border-top">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-3">
                        <span class="badge {{$promocion->estatus == 1 ? 'bg-success' : 'bg-secondary'}} ">@if($promocion->estatus == 1) Activo @else Inactivo @endif</span>
                    </li>
                    <li class="list-inline-item me-6">
                        <i class="bx bx-dollar me-1"></i> Inv Inicial {{ $promocion->inv_inicial}}
                    </li>
                    <li class="list-inline-item me-2">
                        <a onclick="getData('{{ $promocion->id }}')" data-bs-toggle="modal" data-bs-target=".update-promo"><i class="bx bx-pencil"></i> Ver mas</a>
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

                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <label class="control-label">Tipo Promocion</label>
                        <select name="tipopromocion" id="tipopromocion" class="form-select">
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
                                        <input type="text" class="form-control" placeholder="Fecha Inicio" id="fecha-inicio" name="start" />
                                        <input type="text" class="form-control" placeholder="Fecha Fin" id="fecha-fin" name="end" />
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
                                        <input class="form-check-input" id="chkVigencia" name="chkVigencia" type="checkbox">
                                        <label class="form-check-label" for="chkVigencia">Cumplir Vigencia</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="chkAgotarExistencia" name="chkAgotarExistencia" type="checkbox">
                                        <label class="form-check-label" for="chkAgotarExistencia">Agotar Existencias</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
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
                                            <input type="checkbox" id="promo-active" name="active" switch="bool"  />
                                            <label for="promo-active" data-on-label="Yes" data-off-label="No"></label>
                                        </div>

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
    var idPromo = 0;
    function getData(id) {

        $.ajax({
            url: "/promocion-detail",
            type: 'post',
            data: {
                idPromocion: id,
                '_token': '{{ csrf_token() }}',
            },
            success: function(data) {
                idPromo = id;
                console.log(data);
                $('#tipopromocion').val(data.tipo).prop('selected', true);
                $('#codigocupon').val(data.codigo)
                $('#fecha-inicio').val(data.inicio)
                $('#fecha-fin').val(data.fin)
                $('#fecha-fin').val(data.fin)
                $('#inversionini').val(data.inv_inicial)
                $('#descuentocupon').val(data.descuento_cupon)
                $('#terminosdesc').append(data.terminos)
                if (data.chk_vigencia == 1)
                    $('#chkVigencia').prop('checked', true);
                if (data.chk_agotar_exist == 1)
                    $('#chkAgotarExistencia').prop('checked', true);
                if (data.estatus == 1)
                    $('#promo-active').prop('checked', true);


            }
        });
    }

    function update() {
        console.log(
            
            $('#terminosdesc').val(),
            $('#inversionini').val(),
            $('#descuentocupon').val(),
            $('#chkVigencia').is(':checked'),
            $('#chkAgotarExistencia').is(':checked'),
            $('#fecha-inicio').val(),
            $('#fecha-fin').val(), )
        console.log(idPromo)
        $.ajax({
            url: "/update-promocion/" + idPromo,
            type: 'POST',
            data: {
                idPromo: idPromo,
                '_token': '{{ csrf_token() }}',
                'tipo': $('#tipopromocion').val(),
                'codigo': $('#codigocupon').val(),
                'terminos': $('#terminosdesc').val(),
                'inv_inicial': $('#inversionini').val(),
                'descuento_cupon': $('#descuentocupon').val(),
                'chk_vigencia': $('#chkVigencia').is(':checked'),
                'chk_agotar_exist': $('#chkAgotarExistencia').is(':checked'),
                'active': $('#promo-active').is(':checked'),
                'inicio': $('#fecha-inicio').val(),
                'fin': $('#fecha-fin').val(),
            },
            success: function(response) {
                window.location = "{{ route('promocionesLista') }}";
            }
        });
    }
</script>
@endsection