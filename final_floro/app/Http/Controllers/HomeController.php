<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = User::orderBy('id', 'desc')->paginate(10);

        if ($request->has('sort')) 
        {
            $user = User::orderBy($request->get('sort'), $request->get('direction'))->paginate(10);
        }
        
        return view('home', compact('user'));
    }
}
