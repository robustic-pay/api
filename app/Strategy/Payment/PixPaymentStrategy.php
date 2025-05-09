<?php

namespace App\Strategy\Payment;

use App\Interfaces\Payment\PixPaymentInterface;
use App\Strategy\PaymentStrategy;

class PixPaymentStrategy implements PaymentStrategy
{
    public function __construct(PixPaymentInterface $gateway)
    {
        //
    }

    public function pay() {}
}
