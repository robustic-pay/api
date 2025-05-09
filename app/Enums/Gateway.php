<?php

namespace App\Enums;

enum Gateway: string
{
    case MercadoPago = 'mercado_pago';
    case Stripe = 'stripe';
}
