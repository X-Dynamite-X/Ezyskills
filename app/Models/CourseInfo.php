<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'about',
        'content',
        'objectives',
        'projects',
    ];

    // تحويل الحقول من JSON إلى مصفوفات عند استرجاعها
    protected $casts = [
        'content' => 'array',
        'objectives' => 'array',
        'projects' => 'array',
    ];

    // تحويل المصفوفات إلى JSON عند حفظها
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = is_array($value) ? json_encode($value) : $value;
    }

    public function setObjectivesAttribute($value)
    {
        $this->attributes['objectives'] = is_array($value) ? json_encode($value) : $value;
    }

    public function setProjectsAttribute($value)
    {
        $this->attributes['projects'] = is_array($value) ? json_encode($value) : $value;
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}


