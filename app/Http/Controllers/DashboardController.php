<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Models\Card;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id==2) {
            $data = $this->getSoraDashboardContent();
        } elseif (Auth::user()->role_id==1) {
            $data = $this->getCompanyDashboardContent();
        } else {
            $data = $this->getEmployeeDashboardContent();
        }
        // dd($data);
        return view('dashboard', $data);
    }

    public function getSoraDashboardContent()
    {
        $data['totalCards'] = Employee::count();
        $data['cardStatistics'] = DB::table('employees')
                                    ->select(DB::raw('count(*) as total, 
                                        (select count(*) from employees where Date(created_at) = CURRENT_DATE() and deleted_at is null) as today,
                                        (select count(*) from employees where Date(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) and deleted_at is null) as yesterday,
                                        (select count(*) from employees where Date(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) and deleted_at is null)/(select count(*) from employees where Date(created_at) < CURRENT_DATE() and deleted_at is null) as yesterday_percentage,
                                        (select count(*) from employees)/count(*) as current_percentage'))
                                    ->where('deleted_at', 'is', 'null')
                                    ->get();
        $data['totalCompanies'] = Company::count();
        $data['companyStatistics'] = DB::table('companies')
                                    ->select(DB::raw('count(*) as total, 
                                        (select count(*) from companies where Date(created_at) = CURRENT_DATE() and deleted_at is null) as today,
                                        (select count(*) from companies where Date(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) and deleted_at is null) as yesterday,
                                        (select count(*) from companies where Date(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) and deleted_at is null)/(select count(*) from companies where Date(created_at) < CURRENT_DATE() and deleted_at is null) as yesterday_percentage,
                                        (select count(*) from companies)/count(*) as current_percentage'))
                                    ->where('deleted_at', 'is', 'null')
                                    ->get();
        return $data;
    }

    public function getCompanyDashboardContent()
    {
        $data['employees'] = Employee::where('company_id', Auth::user()->user_linked_id)->limit(2)->get();
        $data['totalEmployee'] = Employee::where('company_id', Auth::user()->id)->count();
        $data['totalCards'] = Card::join('employees', 'employees.id', '=', 'cards.employee_id')->where('company_id', Auth::user()->id)->count();
        return $data;
    }

    public function getEmployeeDashboardContent()
    {
        $data['employee'] = Employee::find(session()->get('user_linked_id'));
        return $data;
    }
}