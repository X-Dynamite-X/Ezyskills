<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;

class Course extends Model
{
    use HasFactory,HasRoles, Notifiable;
    protected $fillable = [
        'title',
        'description',
        'image',
        'trainer_id',
        'pricing',
        'status',
    ];

    protected $casts = [

        'pricing' => 'decimal:2',
    ];

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'enrollments')

            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "enrollments")

            ->withTimestamps();
    }
    public function courseInfo()
    {
        return $this->hasOne(CourseInfo::class);
    }
    public function ratings()
    {
        return $this->hasMany(Review::class);
    }
   

}