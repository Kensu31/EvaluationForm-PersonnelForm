<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Models\EmployeeEvaluation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'employee_number' => 'required|numeric',
            'date_prepared' => 'required|date',
            'first_name' => 'required',
            'last_name' => 'requierd',
            'date_hired' => 'required|date',
            'radioUpgradePosition' => 'required',
            'radioEffectiveDatePosition' => 'required',
            'job_title_from' => 'required',
            'job_title_to' => 'required',
            'job_level_from' => 'required',
            'job_level_to' => 'required',
            'department_from' => 'required',
            'department_to' => 'required',
            'supervisor_from' => 'required',
            'supervisor_to' => 'required',
            'employment_status_from' => 'required',
            'employment_status_to' => 'required',
            'radioUpgradeSalary' => 'required',
            'radioEffectiveDateSalary' => 'required',
            'basic_salary_from' => 'required|numeric',
            'basic_salary_to' => 'required|numeric',
            'radioUpgradeCharges' => 'required',
            'radioEffectiveDateCharges' => 'required',
            'food_allowance_from' => 'required|numeric',
            'food_allowance_to' => 'required|numeric',
            'vacation_leave_from' => 'required|numeric',
            'vacation_leave_to' => 'required|numeric',
            'sick_leave_from' => 'required|numeric',
            'sick_leave_to' => 'required|numeric',
            'birthday_leave_from' => 'required|numeric',
            'birthday_leave_to' => 'required|numeric',
            'remarkable_performance' => 'required',
            'rooms_for_improvements' => 'required',
            'manager_name' => 'required',
            'received' => 'requried',
            'approval_date' => 'required'
        ]);

        $employee = Employee::create([
            'employee_number' => $request->employee_number,
            'date_prepared' => $request->date_prepared,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_hired' => $request->date_hired
        ]);

    }
}