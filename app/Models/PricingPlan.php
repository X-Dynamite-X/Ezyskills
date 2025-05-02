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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
}