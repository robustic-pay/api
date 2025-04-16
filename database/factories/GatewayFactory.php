<?php

namespace Database\Factories;

use App\Enums\Gateway;
use App\Gateways\MercadoPagoGateway;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GatewayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return match ($data) {
            "mercado_pago" => new MercadoPagoGateway()
        };
    }
}
