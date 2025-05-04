<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\{Course, Enrollment};
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('trainer_channel_{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('course_channel_{courseId}', function ($user, $courseId) {
    $isEnrolled = Enrollment::where('user_id', $user->id)
        ->where('course_id', $courseId)
        ->exists();

    $isTrainer = Course::where('id', $courseId)
        ->where('trainer_id', $user->id)
        ->exists();

    return $isEnrolled || $isTrainer;
});
