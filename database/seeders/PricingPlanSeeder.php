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
                'price' => 100,
                "credit" => 2,
                "description" => "Perfect for beginners looking to start their learning journey. Access to essential courses and foundational learning materials.",
                "features" => "Access to 5 basic courses,24/7 email support,Mobile app access,Basic learning materials,1-month access"
            ],
            [
                'name' => "Premium",
                "user_id"=>1,
                'price' => 150,
                "credit" => 4,
                "description" => "Ideal for dedicated learners who want to expand their skills. Includes premium courses, downloadable resources, and priority support.",
                "features" => "Access to 15 premium courses,24/7 priority support,Mobile app access,Downloadable resources,3-month access,Certificate of completion,1 live Q&A session"
            ],
            [
                'name' => "Professional",
                "user_id"=>1,
                'price' => 200,
                "credit" => 8,
                "description" => "For serious professionals focused on career advancement. Includes all premium features plus personalized mentorship sessions and comprehensive career guidance.",
                "features" => "Access to all 30+ courses,24/7 priority support,Mobile app access,All downloadable resources,6-month access,Certificate of completion,4 live Q&A sessions,2 one-on-one mentorship sessions,Career guidance consultation"
            ],
            [
                'name' => "Enterprise",
                "user_id"=>1,
                'price' => 250,
                "credit" => 12,
                "description" => "Complete learning solution for teams and organizations. Unlimited access to all courses, custom learning paths, and dedicated account manager for organizational success.",
                "features" => "Unlimited access to all courses,24/7 VIP support,Mobile app access,All downloadable resources,12-month access,Certificate of completion,Unlimited live Q&A sessions,6 one-on-one mentorship sessions,Team progress tracking,Custom learning paths,Dedicated account manager,Bulk enrollment discounts"
            ],
        ];
        foreach ($planes as $plane) {

            PricingPlan::create($plane);
        }
    }
}


