<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $auth;
    public function __construct()
    {
        $this->auth = Auth::user();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("student.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Course $course)
    {

        if(Auth::chack() && $this->auth->credit >0){

            $this->auth->credit -= 1;
            $this->auth->save();
            $course->enrolledUsers()->attach($this->auth->id);
            return redirect()->route('courses.show', $course->id);
        }

        $course->enrolledUsers()->attach($this->auth->id);
        return redirect()->route('courses.show', $course->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
