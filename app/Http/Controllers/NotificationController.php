<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    //
    public function getUserNotifications()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $userNotifications = $user->notifications;
        $unreadUserNotificationsCount = $user->unreadNotifications->count();

        $enrolledCourses = $user->enrollments()
            ->with(['course.notifications' => function ($query) {
                $query->latest();
            }])
            ->get();

        $courseNotifications = collect();
        $unreadCourseNotificationsCount = 0;

        foreach ($enrolledCourses as $enrollment) {
            if ($enrollment->course) {
                $courseNotifications = $courseNotifications->merge(
                    $enrollment->course->notifications ?? collect()
                );

                $unreadCourseNotificationsCount += optional($enrollment->course->unreadNotifications)->count() ?? 0;
            }
        }

        $allNotifications = $userNotifications
            ->merge($courseNotifications)
            ->sortByDesc('created_at')
            ->values();

        return response()->json([
            'notifications' => $allNotifications,
            'unread_count' => $unreadUserNotificationsCount + $unreadCourseNotificationsCount
        ]);
    }



public function markAllAsRead()
{
    $user = Auth::user();

    // تحديد إشعارات المستخدم كمقروءة
    $user->unreadNotifications->markAsRead();

    // تحديد إشعارات الكورسات كمقروءة للمستخدم
    $enrolledCourses = $user->enrollments()->with('course.notifications')->get();

    foreach ($enrolledCourses as $enrollment) {
        $course = $enrollment->course;
        $course->unreadNotifications->markAsRead();
    }

    return response()->json([
        'status' => 'success',
        'message' => 'All notifications marked as read.',
    ]);
}}
