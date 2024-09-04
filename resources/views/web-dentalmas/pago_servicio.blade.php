<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Dental +</title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Clinica Dental Mas">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>

@section('body')


<body data-sidebar="dark">

    @show
    <!-- Begin page -->
    
    <div id="layout-wrapper">
        <div class="main-content" style="margin-left:0 !important;">
            <div class="page-content">
                <div class="container-fluid">
                @if (session()->has('message'))
                <div class="alert {{session('alert')}} alert-dismissible fade show" role="alert">
                    {{session('message')}}
                    {{session()->forget('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session()->has('pago-done'))
                <div class="alert {{session('alert')}} alert-dismissible fade show" role="alert">
                    {{session('pago-done')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Resumen del pedido</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Servicio :</td>
                                                        <td>{{ $servicio->nombre }}</td>
                                                    </tr>
                                                   
                                                    @isset($descuento)
                                                    <tr>
                                                        <td>Descuento : </td>
                                                        <td>- $ {{ $descuento }}</td>
                                                    </tr>
                                                    @endif
                                                    
                                                    <tr id="cupon-section" hidden>
                                                        <td id="codigo-cupon2">Cupon :  </td>
                                                        <td id="total-cupon"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Total :</th>
                                                        <th>$ {{ $servicio->precio_base }}</th>
                                                    </tr>
                                                    <tr id="total-descuento" hidden>
                                                        <th>Total con descuento:</th>
                                                        <th id="total-servicio"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body cupon-msg">
                                        <h4 class="card-title mb-3">Cupon de descuento</h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">¿Tienes un codigo de descuento? introducelo aqui :</td>

                                                    </tr>
                                                    <tr id="cupon-field">
                                                        <td>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="codigo_cupon" id="codigo-cupon" placeholder="Codigo del cupón">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-2">

                                                                <a onclick="validateCupon()" class="btn btn-success"> Aplicar </a>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="col-xl-8 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">
                                                <div>
                                                    <h4 class="card-title">Información de cliente</h4>
                                                    <p class="card-title-desc">Complete la informacion </p>
                                                    <form role="form" action="{{ route('procesar_pago') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51KHCKdFxH8hQdyTwwUu6X9tysI57iyF2Qso3Sp5FNeE9WqO9y7ZfhE4ZrzUPTYGQlwF7fDtHbVjRaHc56hLbfOrR00qj7l3Xo0" id="payment-form">
                                                        @csrf
    
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-name" class="col-md-2 col-form-label">Nombre</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="nombre" id="billing-name" placeholder="Introduzca su nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-email-address" class="col-md-2 col-form-label">Correo Electronico</label>
                                                            <div class="col-md-10">
                                                                <input type="email" class="form-control" name="correo" id="billing-email-address" placeholder="ejemplo@ejemplo.com" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-phone" class="col-md-2 col-form-label">Celular</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="telefono" id="billing-phone" placeholder="Introduce tu numero celular a 10 digitos">
                                                            </div>
                                                        </div>




                                                        <div>
                                                            <h4 class="card-title">Informacion de Pago</h4>
                                                            <div>
                                                                <div class="form-check form-check-inline font-size-16">
                                                                    <input class="form-check-input" type="radio" name="paymentoptionsRadio" id="paymentoptionsRadio1" checked>
                                                                    <label class="form-check-label font-size-13" for="paymentoptionsRadio1"><i class="fab fa-cc-mastercard me-1 font-size-20 align-top"></i> Tarjeta Credito /
                                                                        Debito</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-4 border">
                                                                <div class="col-lg-3">
                                                                    <div class="form-group mt-4 mb-0">
                                                                        <label for="cvvcodeInput">Sucursal</label>
                                                                        <select class="form-control" name="sucursal" id="sucursal" required>
                                                                            @foreach($sucursales as $sucursal)
                                                                            <option value="{{ $sucursal->id }}">{{  $sucursal->ciudad }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="p-4 border">
                                                                <form>
                                                                    <div class="form-group mb-0">
                                                                        <label for="cardnumberInput">Numero de tarjeta</label>
                                                                        <input type="text" class="form-control" id="cardnumberInput" placeholder="0000 0000 0000 0000" required>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group mt-4 mb-0">
                                                                                <label for="cardnameInput">Titular de la tarjeta</label>
                                                                                <input type="text" class="form-control" id="cardnameInput" placeholder="Titular de la tarjeta" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <div class="form-group mt-4 mb-0">
                                                                                <label for="expirydateInput">Fecha de expiracion</label>
                                                                                <input type="text" class="form-control" id="expirydateInput" placeholder="MM/YY" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <div class="form-group mt-4 mb-0">
                                                                                <label for="cvvcodeInput">CVV</label>
                                                                                <input type="text" class="form-control" id="cvvcodeInput" placeholder="000" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><br><br>
                                                        <div class="p-4 border">
                                                            <div class="flex flex-col gap-5">
                                                                <div class="form-group form-check">
                                                                    <input type="checkbox" class="form-check-input" id="check_terminos_condiciones">
                                                                    <label class="form-check-label" for="check_terminos_condiciones">Acepto los <a href="{{ route('terminos_condiciones') }}" class="underline">Terminos y Condiciones</a>.
                                                                        Obtenga más información sobre cómo usamos y protegemos sus datos en nuestra <a href="{{ route('politicas_privacidad') }}" class="underline">Política de privacidad.</a></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mt-4">
                                                            <div class="col-sm-6">
                                                                <a href="/servicios" class="btn text-muted d-none d-sm-inline-block btn-link">
                                                                    <i class="mdi mdi-arrow-left me-1"></i> Regresar lista de servicios </a>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="text-end" id="text-end">
                                                                <a id="payment-btn" onclick="validate()" class="btn btn-success" >
                                                                <i class="mdi mdi-cart-arrow-right me-1"></i> Pagar </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- @include('layouts.footer') -->
        </div>
        <!-- end main content-->
    </div>
    <!-- JAVASCRIPT -->
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/libs/metismenu/metismenu.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/node-waves.min.js"></script>

    <script src="/assets/js/app.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">

    $(document).ready(function() {
        
        $("#check_terminos_condiciones").change(function() {
            
            if($(this).is(':checked')){
                $('#payment-btn').removeClass('disabled')
                
            }else{
                
                $('#payment-btn').addClass('disabled')
            }
        });
    });

       

        function validate() {
            // console.log(document.forms["payment-form"].getElementsByTagName("input"));
             const onlyInputs = document.forms["payment-form"].getElementsByTagName("input");
            flag = false;
            onlyInputs.foreach(function (input) {
                return input.value === ''
            });
            if(flag)
                return;
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            console.log($inputs);
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                console.log($input);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                    
                }
            });
            if (!$form.data('cc-on-file')) {
                var expirateDate = $('#expirydateInput').val();
                var expMont = expirateDate.split('/')[0];
                var expYear = expirateDate.split('/')[1];
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('#cardnumberInput').val(),
                    cvc: $('#cvvcodeInput').val(),
                    exp_month: expMont,
                    exp_year: expYear
                }, stripeResponseHandler);
            }
        }

        function stripeResponseHandler(status, response) {
            var total = <?php echo json_encode($servicio->precio_base); ?>;
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var servicio = <?php echo json_encode($servicio->nombre); ?>;
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.append("<input type='hidden' name='total' value='" + total + "'/>");
                $form.append("<input type='hidden' name='servicio' value='" + servicio + "'/>");
                $form.append("<input type='hidden' name='sucursal' value='" + $('#sucursal').val() + "'/>");
                $form.append($('#codigo-cupon'));
                $form.get(0).submit();
            }
        }


        function validateCupon() {
            if ($('#codigo-cupon').val() == '')
                return
            var idServicio = <?php echo json_encode($servicio->id); ?>;

            $.ajax({
                url: "/servicios/verificar-cupon",
                type: 'POST',
                data: {
                    'codigo_cupon': $('#codigo-cupon').val(),
                    '_token': '{{ csrf_token() }}',
                },
                success: function(response) {
                    
                    if (response[0] == 'no valido') {
                        var msg = $(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            'Cupon de descuento no valido' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        )
                        $('.cupon-msg').append(msg);
                        return
                    }

                    var msg = $(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        'Descuento valido' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    )

                    
                    $('.cupon-msg').append(msg);
                    $('#cupon-field').css('display', 'none');
                    
                    $('#codigo-cupon2').append($('#codigo-cupon').val());
                    $('#total-cupon').append('-$ '+ response[1].descuento_cupon);
                    $('#cupon-section').removeAttr('hidden');
                    $('#total-descuento').removeAttr('hidden');
                    var total =<?php echo json_encode($servicio->precio_base); ?>;
                    let totalDescuento = total - response[1].descuento_cupon; 
                    $('#total-servicio').text('$ '+totalDescuento);
                }
            });
        }

        (function(){
            // Don't go any further down the script if [data-notification] is not set.
            var type = "{{ Session::get('pago-done') }}";
            var redirect = "{{ Session::get('redirect') }}";
            
            if(type){
                var delay = 5000; 
                setTimeout(function(){ 
                    {{session()->forget('pago-done')}}
                    {{session()->forget('redirect')}}
                    window.location = redirect; 
                },delay);
            }
            

            // toastr['info']('message') is the same as toastr.info('message')
        })();
    </script>
</body>

</html>