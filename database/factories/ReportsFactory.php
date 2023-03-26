<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports>
 */
class ReportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "DocumentType" => $this->faker->randomElement(['Invoice', 'CreditNote', 'DebitNote', 'Receipt', 'SelfBilledInvoice', 'AdvanceReceipt']),
            "DocumentNumber" => $this->faker->randomNumber(8),
            'report_cat_id' => $this->faker->numberBetween(1, 5),
            'category_name' => $this->faker->text(10),

            "user_id" => $this->faker->numberBetween(35),
            "document_url" => $this->faker->url,

        ];
    }
}