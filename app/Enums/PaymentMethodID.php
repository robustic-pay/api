<?php

namespace App\Enums;

enum PaymentMethodID : string {
    case Pix = 'pix';
    case Visa = 'visa';
}