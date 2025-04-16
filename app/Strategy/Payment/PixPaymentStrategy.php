<?php

namespace App\Strategy\Payment;

use App\Strategy\PaymentStrategy;
use App\Interfaces\Payment\PixPaymentInterface;

class PixPaymentStrategy implements PaymentStrategy
{
    public function __construct(PixPaymentInterface $gateway)
    {
        //
    }

    public function pay() 
    {

    }
}