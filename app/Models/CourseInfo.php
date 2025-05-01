<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseInfo extends Model
{
    //
    protected $fillable = [
        'course_id',
        'about',
        'content',
        'objectives',
        'projects',
    ];
    protected $casts = [
        'content' => 'array',
        'objectives' => 'array',
        'projects' => 'array',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
 
        public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->withPivot(['status', 'enrolled_at', 'pricing_plan_id'])
            ->withTimestamps();
    }

    
}