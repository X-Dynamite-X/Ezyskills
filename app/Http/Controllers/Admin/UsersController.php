<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
            $role = $request->input('role');
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->Where('email', 'LIKE', "%{$search}%");
            })->when($role, function ($query, $role) {
            $query->whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            });
        })->orderBy('id')
            ->latest()
            ->paginate(10) ;

        if ($request->ajax()) {
            $usersView = view('admin.users.table', compact('users'))->render();
            $pagination = $users->appends(['search' => $search, 'role' => $role])->links()->render();
            return response()->json(['users' => $usersView, 'pagination' => $pagination]);
        }

        return view('admin.users.index', compact('users'));
    }



    public function update(Request $request, User $user)
    {
        $validated = $request->validate([

            'email' => 'required|email',
            'status' => 'required|string',
        ]);

         $user->syncRoles($validated['status']);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'User updated successfully',
                'user' => $user,
                'status' => $validated['status']
            ]);
        }

        return redirect()->route('admin.users')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            if (request()->ajax()) {
                return response()->json([
                    'message' => 'User deleted successfully'
                ]);
            }

            return redirect()->route('admin.users')
                ->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'message' => 'Failed to delete user'
                ], 500);
            }

            return redirect()->route('admin.users')
                ->with('error', 'Failed to delete user');
        }
    }
}
