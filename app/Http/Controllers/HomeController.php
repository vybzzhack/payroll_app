<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Payrolls;
use App\Models\Departments;
use App\Models\Leaves;
use App\Models\Attendance;
use App\Models\Employeerecords;

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

    public function index()
    {
        $employeeCount = Employee::count();
        $userCount = User::count();
        $payrollCount = Payrolls::count();
        $departmentCount = Departments::count();
        $leaveCount = Leaves::count();
        $attendanceTodayCount = Attendance::whereDate('created_at', now()->toDateString())->count();

        $departmentCounts = Departments::withCount('employees')->get();
        $departmentNames = $departmentCounts->pluck('department_name'); // Department names
        $employeeCounts = $departmentCounts->pluck('employees_count'); // Employee counts

        $employeeOfTheMonth = Employeerecords::with('department')
            ->where('record_type', 'employee of the month')
            ->latest()
            ->first();

        return view('home', compact(
            'employeeCount', 
            'userCount', 
            'payrollCount', 
            'departmentCount', 
            'leaveCount', 
            'attendanceTodayCount',
            'departmentCounts',
            'departmentNames',
            'employeeCounts',
            'employeeOfTheMonth'
        ));
    }

}
