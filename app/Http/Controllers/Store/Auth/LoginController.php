<?php

namespace App\Http\Controllers\Store\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/store/home';

    public function __construct()
    {
        $this->middleware('guest:store')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('store');
    }

    // ログイン画面
    public function showLoginForm()
    {
        return view('store.auth.login');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('store')->logout();

        return $this->loggedOut($request);
    }

    // ログアウトした時のリダイレクト先
    public function loggedOut(Request $request)
    {
        return redirect(route('home'));
    }
}