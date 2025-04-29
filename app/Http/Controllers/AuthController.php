<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    // عرض نموذج تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // معالجة تسجيل الدخول
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            if($request->ajax()){

                return response()->json([
                    'success' => true,
                    'redirect' => redirect()->intended('/')->getTargetUrl()
                ]);
            }
            return redirect("/");
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);
    }

    // عرض نموذج التسجيل
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // معالجة التسجيل
    public function register(Request $request)
    {

        $validated = $request->validate([

            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', PasswordRules::defaults()]
        ]);

        $user = User::create([

            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);
        $user->assignRole('student');

        Auth::login($user);
        if($request->ajax()){

            return response()->json([
                'success' => true,
                'redirect' => redirect()->intended('/')->getTargetUrl()
            ]);
        }
        return redirect('/');
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // عرض نموذج نسيت كلمة المرور
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // معالجة طلب إعادة تعيين كلمة المرور
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['success' => true, 'message' => 'Password reset link has been sent'])
            : response()->json(['success' => false, 'message' => __($status)], 400);
    }

    // عرض نموذج إعادة تعيين كلمة المرور
    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.reset-password', ['request' => $request, 'token' => $token]);
    }

    // معالجة إعادة تعيين كلمة المرور
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', PasswordRules::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json([
                'success' => true,
                'message' => 'Password has been reset successfully',
                'redirect' => route('login')
            ])
            : response()->json([
                'success' => false,
                'message' => __($status)
            ], 400);
    }

    // التحقق من حالة المصادقة


}