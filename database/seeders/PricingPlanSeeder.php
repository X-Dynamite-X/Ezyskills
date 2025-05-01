<?php

namespace Database\Seeders;

use App\Models\PricingPlan;
use Illuminate\Database\Seeder;

class PricingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $planes = [
            [
                'name' => "Basic",
                "user_id"=>1,
                'price' => 10,
                "credit" => 10,
                "description" => "Perfect for beginners. Access to essential courses and basic learning materials."
            ],
            [
                'name' => "Premium",
                "user_id"=>1,
                'price' => 20,
                "credit" => 50,
                "description" => "Ideal for dedicated learners. Includes premium courses, downloadable resources, and priority support."
            ],
            [
                'name' => "Professional",
                "user_id"=>1,
                'price' => 30,
                "credit" => 100,
                "description" => "For serious skill development. Includes all premium features plus mentorship sessions and career guidance."
            ],
            [
                'name' => "Enterprise",
                "user_id"=>1,
                'price' => 40,
                "credit" => 200,
                "description" => "Complete learning solution for teams. Unlimited access to all courses, custom learning paths, and dedicated account manager."
            ],
        ];
        foreach ($planes as $plane) {

            PricingPlan::create($plane);
        }
    }
}