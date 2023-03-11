<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ResetPasswordRequest;
use App\Http\Requests\Website\SignInRequest;
use App\Http\Requests\Website\SignUpRequest;
use App\Http\Requests\Website\verificationCodeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $layout = 'website::pages.auth.';

    public function onSignIn()
    {
        return view($this->layout. 'sign-in');
    }

    public function onAccessSignIn(SignInRequest $request)
    {
        try {
            $remember   = $request->remember ? true : false;
            $status     = 'success';
            $error      = false;
            $message    = 'Login success';
            $redirectTo = request('returnUrl') ?? route('website-home');
            $user       = User::query()
                            ->where(function ($query) use ($request) {
                                $query->where('username', $request->user)
                                    ->orWhere('phone', $request->user);
                            })
                            ->first();

            switch ($user) {
                case $user->role != config('dummy.user.role.user'):
                    $status     = 'info';
                    $error      = true;
                    $message    = 'Your account is not a user account';
                    break;
                case $user->status != config('dummy.status.active.key'):
                    $status     = 'info';
                    $error      = true;
                    $message    = 'Your account is not active';
                    break;

                case Hash::check($request->password, $user->password) == false:
                    $status     = 'error';
                    $error      = true;
                    $message    = 'Password is not correct';
                    break;

                default:
                    auth('web')->login($user, $remember);
                    break;
            }

            return response()->json([
                'status'   => $status,
                'error'    => $error,
                'message'  => $message,
                'redirect' => $redirectTo,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'   => 'error',
                'message'  => 'Your account is not found',
                'error'    => true,
            ]);
        }
    }
    
    public function onRequestOTP(verificationCodeRequest $req)
    {
        try {
            return response()->json([
                'status'   => true,
                'message'  => 'success',
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status'   => false,
                'message'  => $e->getMessage(),
            ]);
        }
    }

    public function onSignUp()
    {
        return view($this->layout. 'sign-up');
    }

    public function onSignUpStore(SignUpRequest $request)
    {
        try {
            $redirectTo = request('returnUrl') ?? route('website-home');

            $items = [
                'name'          => $request->name,
                'username'      => $request->username,
                'phone'         => $request->phone ?? null,
                'email'         => $this->createDefaultEmail($request->username),
                'role'          => config('dummy.user.role.user'),
                'password'      => bcrypt($request->password),
                'status'        => config("dummy.status.active.key"),
            ];

            User::create($items);

            auth('web')->attempt([
                'username' => $request->username,
                'password' => $request->password,
            ]);

            return response()->json([
                'status'   => 'success',
                'error'    => false,
                'message'  => 'Account has been created',
                'redirect' => $redirectTo,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'   => 'error',
                'message'  => $e->getMessage(),
                'error'    => true,
            ]);
        }
    }

    public function onForgotPassword()
    {
        return view($this->layout.'forgot-password');
    }

    public function onResetPassword(ResetPasswordRequest $request)
    {
        try {
            $redirectTo = request('returnUrl') ?? route('website-home');
            $user       = User::query()
                            ->when($request->phone, function ($q) use ($request) {
                                $q->wherePhone($request->phone)
                                    ->whereRole(config('dummy.user.role.user'));
                            })
                            ->first();

            $user->password = bcrypt($request->password);
            $user->save();

            auth('web')->login($user);
            return response()->json([
                'status'   => 'success',
                'error'    => false,
                'message'  => 'Password has been reset',
                'redirect' => $redirectTo,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'   => 'error',
                'message'  => 'Password can not be reset',
                'error'    => true,
            ]);
        }
    }

    public function onSignOut()
    {
        try {
            auth('web')->logout();
            return redirect()->route('website-home');

        } catch (\Exception $e) {
            return back();
        }
    }

    public function createDefaultEmail($username)
    {
        $email = $username.'@example.com';
        return $email;
    }
}