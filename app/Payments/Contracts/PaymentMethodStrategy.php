<?php

namespace App\Contracts;

interface PaymentMethodStrategy 
{
    public function charge(array $payload) : array;
}