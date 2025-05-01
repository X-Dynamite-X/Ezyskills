<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $auth;

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $search = $request->input('search');
            $status = $request->input('status');
            $courses = $this->auth->courses()->when($search, function ($query, $search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })->when($status, function ($query, $status) {
                $query->where('status', $status);
            })->paginate(10);
            $courses->appends(['search' => $search, 'status' => $status]);

            return response()->json([
                'courses' => view('trainer.table', compact('courses'))->render(),
                'pagination' => $courses->links()->render(),
            ]);
        }
        $courses = $this->auth->courses()->paginate(10);

        return view("trainer.index", compact('courses'));
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
    public function store(Request $request)
    {
        //
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