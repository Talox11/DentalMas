<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Session;
use Stripe;

class PaymentsController extends Controller
{
    //
    public function procesar_pago(Request $request)
    {

        
        $amount = (float)$request->total;
        $sucursal = Sucursal::toBase()->where('id', $request->sucursal)->first();


        $redirect = 'https://17dea939a6cb2907e6291c294c7a15306cf97d93.agenda.softwaredentalink.com/agendas/agendaExpress';
        if($sucursal->ciudad === 'Mexicali' || $sucursal->ciudad === 'León')
            $redirect = 'https://35dd767addca2ec45da4596d4e1465c8e555dc5e.agenda.softwaredentalink.com/agendas/agendaExpress';
        if ($request->codigo_cupon) {
            $cupon = Promocion::toBase()->where('codigo', $request->codigo_cupon)->first();


            if ($cupon->tipo == 'precio')
                $amount = $amount - $cupon->descuento_cupon;
            else
                $amount = $amount - (($cupon->descuento_cupon / 100) * $amount);
        }
        $amount = $amount * 100;

        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;

        try {
            $response = Stripe\Charge::create([
                "amount" => $amount,
                "currency" => "mxn",
                "source" => $token,
                "description" => "Pago servicio de ".$request->servicio. ' Sucursal: '.$sucursal->ciudad,
                'receipt_email' => $request->correo,
            ]);
            

            
            session(['pago-done' => 'Pago realizado. Se te redirigira en 5 segundos a nuestra pagina de citas']);
            session(['redirect' => $redirect]);
            session(['alert' => 'alert-success']);
        } catch (\Throwable $th) {
            return $th;
            session(['message' => 'No se pudo procesar su pago. Verifique que tenga fondos suficientes']);
            session(['alert' => 'alert-danger']);
        }

        return back();
    }

    public function payment2()
    {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => '{{PRICE_ID}}',
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'discounts' => [[
                'coupon' => '{{COUPON_ID}}',
            ]],
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
        ]);
    }
}
