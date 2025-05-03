<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pricing_plan_users', function (Blueprint $table) {
            $table->id();

            // علاقة المستخدم
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // علاقة الخطة - ملاحظة أن اسم العمود هو plan_id وليس plane_id
            $table->foreignId('pricing_plan_id')->constrained()->onDelete('cascade');

            // عدد مرات الاشتراك في نفس الخطة
            $table->unsignedInteger('subscription_number')->default(1);

            // وقت الاشتراك
            $table->timestamp('subscribed_at')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_plans_users');
    }
};
