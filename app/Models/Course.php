<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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



    public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'enrollments')->select([ 'email'])->withTimestamps()

        ;
    }


    public function courseInfo()
    {
        return $this->hasOne(CourseInfo::class);
    }



}
