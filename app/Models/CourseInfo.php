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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
