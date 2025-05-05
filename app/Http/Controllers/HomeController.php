<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{Course, User};

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Course::query();
        $courses = $query->with('trainer')
            ->withCount('enrolledUsers')
            ->withAvg('ratings', 'rating')
            ->whereHas('enrolledUsers')
            ->whereHas('ratings')
            ->orderByDesc('ratings_avg_rating')
            ->orderByDesc('enrolled_users_count')
            ->take(8)
            ->get();
        // $course = Auth::user()->courses()->first();
        // dd($course->ratings()->count());
        $topRatedTrainers = User::select('users.*')
            ->join('courses', 'courses.trainer_id', '=', 'users.id')
            ->join('reviews', 'reviews.course_id', '=', 'courses.id')
            ->selectRaw('AVG(reviews.rating) as average_rating')
            ->groupBy('users.id')
            ->orderByDesc('average_rating')
            ->take(3)
            ->get();

        // dd($topRatedTrainers);

        return view('home', compact(['courses', "topRatedTrainers"]));
    }



}