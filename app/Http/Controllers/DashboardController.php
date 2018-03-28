<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function customer_service()
    {
        return view('dashboard.customer_service');
    }

    public function history()
    {
        return view('dashboard.history');
    }

    public function host_text()
    {
        return view('dashboard.host_text');
    }

    public function invited_candidates()
    {
        return view('dashboard.invited_candidates');
    }

    public function library_public_questions()
    {
        return view('dashboard.library_public_questions');
    }

    public function preview_test()
    {
        return view('dashboard.preview_test');
    }

    public function preview_test_questions()
    {
        return view('dashboard.preview_test_questions');
    }

    public function public_preview()
    {
        return view('dashboard.public_preview');
    }

    public function view()
    {
        return view('dashboard.view');
    }

    public function change_password(){
         return view('dashboard.setting.change_password');
    }

    public function general_setting(){
         return view('dashboard.setting.general_setting');
    }

    public function setting_info(){
         return view('dashboard.setting.info');
    }

}
