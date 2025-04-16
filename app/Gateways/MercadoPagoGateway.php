<?php 

namespace App\Gateways;

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use App\Interfaces\Payment\PixPaymentInterface;

class MercadoPagoGateway implements PixPaymentInterface {

    public function createPaymentWithPix()
    {
        
    }
}