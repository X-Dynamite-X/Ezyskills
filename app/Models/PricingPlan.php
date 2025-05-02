<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'trainer_id',
        'pricing',
        'status'
    ];
    protected $casts = [
        'pricing' => 'int',
    ];

    

    // Get formatted price
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->pricing, 2);
    }

    // Get features as array
    public function getFeaturesArrayAttribute()
    {
        if (empty($this->features)) {
            return [];
        }

        return array_map('trim', explode(',', $this->features));
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'pricing_plan_users');
    }

}
