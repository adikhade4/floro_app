<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use App\Authentication_Logs;

class Authentication_Logs_Controller extends Controller
{
    function authenticated(Request $request, $user, $id)
    {
        $a=auth()->id();
        $user->find($a)->update([
            'user_id' => $request->get(),
            'login_time' => Carbon::now()->toDateTimeString(),
            'logout_time' => Carbon::now()->toDateTimeString(),
            'ip_address' => $request->getClientIp(),
            'browser_agent' => $request->server('HTTP_USER_AGENT'),
        ]);
    }
}
