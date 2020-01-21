<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('cookiesPolicy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function cookiesPolicy()
    {
        $cookie = Cookie::make('cookies_policy', true);
        return response()->json(['message' => "Ciacho zostalo stworzone"])->withCookie($cookie);
    }
}
