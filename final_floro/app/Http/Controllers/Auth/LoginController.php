<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Authentication_Logs;
use Auth;

class LoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
        
        function authenticated(Request $request,$user)
        {
            $a=auth()->id();
            $user->find($a)->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_logout_at' => date('Y-m-d H:i:s'),
                'last_login_ip' => $request->getClientIp(),
                'http_user_agent' => $request->server('HTTP_USER_AGENT'),
            ]);

            Authentication_Logs::insert([
                'user_id' => auth()->id(),
                'ip_address' => $request->getClientIp(),
                'login_time' => Carbon::now()->toDateTimeString(),
                'logout_time' => date('Y-m-d H:i:s'),
                'browser_agent' => $request->server('HTTP_USER_AGENT'),
            ]);
        }

        function logout()
        {
            Authentication_Logs::where('user_id',auth()->id())->update([
                'logout_time' => date('Y-m-d H:i:s'),
            ]);
            Auth::logout();
            return redirect('/login');
        }
}
