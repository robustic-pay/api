<?php

namespace App\Payments\Methods\MercadoPago;

use App\Contracts\PaymentMethodStrategy;
use App\DTO\Payment\PixDTO;
use Illuminate\Support\Str;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;

class Pix implements PaymentMethodStrategy
{
    public function charge(PixDTO $payload): array
    {
        MercadoPagoConfig::setAccessToken('ACCESS_TOKEN');

        $client = new PaymentClient;
        $request_options = new RequestOptions;
        $request_options->setCustomHeaders(['X-Idempotency-Key: '.Str::uudi()]);

        $payment = $client->create([
            'transaction_amount' => (float) $payload->amount,
            'payment_method_id' => $payload->paymentMethodID,
            'payer' => [
                'email' => $payload->email,
            ],
        ], $request_options);

        return $payment;
    }
}
