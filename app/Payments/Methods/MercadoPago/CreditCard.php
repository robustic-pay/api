<?php

namespace App\Payments\Methods\MercadoPago;

class CreditCard implements PaymentMethodStrategy
{
    public function charge(array $payload): array {}
}
