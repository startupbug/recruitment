<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        return view('employee_dashboard.dashboard');
    }

    public function customer_service()
    {
        return view('employee_dashboard.customer_service');
    }

    public function history()
    {
        return view('employee_dashboard.history');
    }

    public function host_text()
    {
        return view('employee_dashboard.host_text');
    }

    public function invited_candidates()
    {
        return view('employee_dashboard.invited_candidates');
    }

    public function library_public_questions()
    {
        return view('employee_dashboard.library_public_questions');
    }

    public function preview_test()
    {
        return view('employee_dashboard.preview_test');
    }

    public function preview_test_questions()
    {
        return view('employee_dashboard.preview_test_questions');
    }

    public function public_preview()
    {
        return view('employee_dashboard.public_preview');
    }

    public function view()
    {
        return view('employee_dashboard.view');
    }

    public function change_password(){
         return view('employee_dashboard.setting.change_password');
    }

    public function general_setting(){
         return view('employee_dashboard.setting.general_setting');
    }

    public function setting_info(){
         return view('employee_dashboard.setting.info');
    }

}
