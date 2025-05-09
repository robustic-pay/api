<?php

namespace App\DTO\Payment;

use App\Enums\PaymentMethodID;

class PixDTO
{
    public float $amount;
    public string $email;
    public string $paymentMethodID;

    public function __construct(float $amount, string $email) {
        $this->email = $email;
        $this->amount = $amount;
        $this->paymentMethodID = PaymentMethodID::Pix->value;
    }
}