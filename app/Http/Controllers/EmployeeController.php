<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use App\PositionMovement;
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
            'received' => 'required',
            'approval_date' => 'required'
        ]);

        $employee = Employee::create([
            'employee_number' => $request->employee_number,
            'date_prepared' => $request->date_prepared,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_hired' => $request->date_hired
        ]);

        $position = $employee->position()->create([
            'job_title_from' => $request->job_title_from,
            'job_title_to' => $request->job_title_to,
            'job_level_from' => $request->job_level_from,
            'job_level_to' => $request->job_level_to,
            'department_from' => $request->department_from,
            'department_to' => $request->department_to,
            'supervisor_from' => $request->supervisor_from,
            'supervisor_to' => $request->supervisor_to,
            'employment_status_from' => $request->employment_status_from,
            'employment_status_to' => $request->employment_status_to,
        ]);

        $positionMovement = $position->positionMovements()->create([
            'reason_for_upgrade' => $request->radioUpgradePosition,
            'effective_date' => $request->radioEffectiveDatePosition,
        ]);

        $salaryAdjustment = $employee->salaryAdjustments()->create([
            'reason_for_upgrade' => $request->radioUpgradeSalary,
            'effective_date' => $request->radioEffectiveDateSalary,
            'basic_salary_from' => $request->basic_salary_from,
            'basic_salary_to' => $request->basic_salary_to,
        ]);
        $additionalCharge = $employee->additionalCharges()->create([
            'reason_for_upgrade' => $request->radioUpgradeCharges,
            'effective_date' => $request->radioEffectiveDateCharges,
            'food_allowance_from' => $request->food_allowance_from,
            'food_allowance_to' => $request->food_allowance_to,
            'vacation_leave_from' => $request->vacation_leave_from,
            'vacation_leave_to' => $request->vacation_leave_to,
            'sick_leave_from' => $request->sick_leave_from,
            'sick_leave_to' => $request->sick_leave_to,
            'birthday_leave_from' => $request->birthday_leave_from,
            'birthday_leave_to' => $request->birthday_leave_to,
        ]);
        $generalRemark = $employee->generalRemarks()->create([
            'remarkable_performance' => $request->input('remarkable-performance'),
            'rooms_for_improvements' => $request->input('rooms_for_improvements'),
        ]);
        $approval = $employee->approvals()->create([
            'manager_name' => $request->manager_name,
            'received' => $request->received,
            'approval_date' => $request->approval_date,
        ]);
        return redirect()->route('personalactionform.form');
    }
}