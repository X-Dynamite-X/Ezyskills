<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory,HasRoles;
    protected $fillable = [
        'title',
        'description',
        'image',
        'trainer_id',
        'price',
        'status',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function pricingPlans()
    {
        return $this->hasMany(PricungPlan::class);
    }

    public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->withPivot(['status', 'enrolled_at', 'pricing_plan_id'])
            ->withTimestamps();
    }

    public function activeEnrollments()
    {
        return $this->enrolledUsers()->wherePivot('status', 'approved');
    }

    public function avgRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
