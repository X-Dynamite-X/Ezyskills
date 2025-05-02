<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlanUser extends Model
{
    //
    protected $fillable = [
        'user_id',
        'plane_id',
        'subscription_number',
        'subscribed_at',
    ];
    protected $casts = [
        'subscribed_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plane()
    {
        return $this->belongsTo(PricingPlan::class);
    }

}
