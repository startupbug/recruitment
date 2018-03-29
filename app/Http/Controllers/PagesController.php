<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout_function()
    {        
        Auth::logout();
        return redirect()->route('login_index');
    }
}
