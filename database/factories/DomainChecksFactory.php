<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\DomainCheckResultEnum;

class DomainChecksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'domain' => $this->faker->url(),
            'creation_date' => now()->subMonths(7),
            'expiry_date' => now()->addYear(),
            'registrar' => 'Test factory registrar',
            'result' => DomainCheckResultEnum::PASSED,
        ];
    }
}
