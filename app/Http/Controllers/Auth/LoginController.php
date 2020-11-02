<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;  // 追記

class LoginController extends Controller //親ファイル(AuthenticatesUsers.php)を継承して子ファイルでメソッド定義する
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;//

    protected $maxAttempts = 3;   //RateLimiter.php

    /**
     * Where to redirect users after login. 
     *
     * @var string
     */
    protected $redirectTo = '/todo';

    /**
     * Create a new controller instance. 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); //実行されなくなる middleware
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/login'); //
    }
}