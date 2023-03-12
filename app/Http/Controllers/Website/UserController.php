<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebsiteBaseController;
use App\Http\Requests\Website\ResetPasswordRequest;
use App\Http\Requests\Website\SignUpRequest;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\UploadFile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends WebsiteBaseController
{
    protected $layout = 'website::pages.user.';
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            view()->share([
                'user' => $this->user,
            ]);
            return $next($request);
        });
    }

    public function onProfile()
    {
        return view($this->layout . 'profile');
    }

    public function onProfileStore(SignUpRequest $request)
    {
        $avatar = UploadFile::uploadPhoto('/user', $request->profile, $request->tmp_profile, true);

        if (!$request->tmp_profile && !$request->profile) {
            if (optional($this->user)->avatar) {
                UploadFile::deleteFile('/user',$avatar->profile);
            }
        }

        if ($request->profile) {
            UploadFile::deleteFile('/user',$request->tmp_profile);
        }

        $this->user->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'avatar'        => $avatar,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function onOrder()
    {
        $data['carts']  = optional($this->user)->carts()->paginate(10);

        return view($this->layout . 'order', $data);
    }

    public function onOrderStatus(Request $req)
    {
        try {
            Cart::whereId($req->id)->update([
                'status' => $req->status
            ]);

            return response()->json([
                'status' => 'success',
                'error' => false,
                'message' => 'Order status changed successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function onOrderRemove(Request $req)
    {
        try {
            Cart::find($req->id)->delete();

            return response()->json([
                'status' => 'success',
                'error' => false,
                'message' => 'Order removed successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function onFavorite()
    {
        $data['products'] = Favorite::query()
                                ->whereUserId($this->user->id)
                                ->whereIsFavorite(config('dummy.status.active.key'))
                                ->paginate(10);

        return view($this->layout . 'favorite', $data);
    }

    public function onChangePassword()
    {
        return view($this->layout . 'change-password');
    }

    public function onChangePasswordStore(ResetPasswordRequest $request)
    {
        $this->user->update([
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 'success',
            'error' => false,
            'message' => 'Password changed successfully',
        ]);
    }
}