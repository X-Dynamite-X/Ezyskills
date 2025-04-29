<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricungPlan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'name',
        'price',
        'description',
        'duration',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}