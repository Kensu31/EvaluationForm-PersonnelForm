<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\BenefitAdjustment;
use App\Models\GeneralRemark;
use App\Models\PersonnelForm;
use App\Models\PositionMovement;
use App\Models\SalaryAdjustment;
use Illuminate\Http\Request;


class PersonnelActionFormController extends Controller
{
    public function index()
    {
        $PersonnelForm =PersonnelForm::all();
        return view('personalactionform.view')->with('personnelForm',$PersonnelForm);
    }
    public function update(Request $request,$id){
        $request->validate([
            'employee_number' => 'required',
            'date_prepared' => 'required|date',
            'first_name' => 'required',
            'last_name' => 'required',
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

        $personnelForm = PersonnelForm::findorFail($id);
        $positionMovements = PositionMovement::where('personnel_form_id',$personnelForm->id)->first();
        $salaryAdjustment = SalaryAdjustment::where('personnel_form_id',$personnelForm->id)->first();
        $benefitsAdjustment = BenefitAdjustment::where('personnel_form_id',$personnelForm->id)->first();
        $generalRemark = GeneralRemark::where('personnel_form_id',$personnelForm->id)->first();
        $approval = Approval::where('personnel_form_id',$personnelForm->id)->first();


        $personnelForm->update([
            'employee_number' => $request->employee_number,
            'date_prepared' => $request->date_prepared,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_hired' => $request->date_hired
        ]);
        
        if($positionMovements)
        {
            $positionMovements->update([
                'reason_for_upgrade' => $request->radioUpgradePosition,
                'effective_date' => $request->radioEffectiveDatePosition,
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
        }
        if($salaryAdjustment)
        {
            $salaryAdjustment->update([
                'reason_for_upgrade' => $request->radioUpgradeSalary,
                'effective_date' => $request->radioEffectiveDateSalary,
                'basic_salary_from' => $request->basic_salary_from,
                'basic_salary_to' => $request->basic_salary_to,
            ]);
        }
        if($benefitsAdjustment)
        {
            $benefitsAdjustment->update([
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
        }
        if($generalRemark)
        {
            $generalRemark->update([
                'remarkable_performance' => $request->remarkable_performance,
                'rooms_for_improvements' => $request->rooms_for_improvements,
            ]);
        }
        if($approval)
        {
            $approval->update([
                'manager_name' => $request->manager_name,
                'received' => $request->received,
                'approval_date' => $request->approval_date,
            ]);
        }
        

    }
    public function store(Request $request)
    {
        $request->validate([
            'employee_number' => 'required',
            'date_prepared' => 'required|date',
            'first_name' => 'required',
            'last_name' => 'required',
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


        $personnelForm = PersonnelForm::create([
            'employee_number' => $request->employee_number,
            'date_prepared' => $request->date_prepared,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_hired' => $request->date_hired
        ]);

        $position = $personnelForm->positionMovements()->create([
            'reason_for_upgrade' => $request->radioUpgradePosition,
            'effective_date' => $request->radioEffectiveDatePosition,
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

        $salaryAdjustment = $personnelForm->salaryAdjustments()->create([
            'reason_for_upgrade' => $request->radioUpgradeSalary,
            'effective_date' => $request->radioEffectiveDateSalary,
            'basic_salary_from' => $request->basic_salary_from,
            'basic_salary_to' => $request->basic_salary_to,
        ]);
        $additionalCharge = $personnelForm->benefitAdjustments()->create([
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
        $generalRemark = $personnelForm->generalRemarks()->create([
            'remarkable_performance' => $request->input('remarkable_performance'),
            'rooms_for_improvements' => $request->input('rooms_for_improvements'),
        ]);
        $approval = $personnelForm->approvals()->create([
            'manager_name' => $request->manager_name,
            'received' => $request->received,
            'approval_date' => $request->approval_date,
        ]);
        session()->flash('success', 'Successfully Submit Personnel Action Form');
        return redirect('/');
    }
    public function show($id){
        $personnelForm = PersonnelForm::with([
            'positionMovements',
            'salaryAdjustments',
            'benefitAdjustments',
            'generalRemarks',
            'approvals'
        ])->find($id);

        return view('personalactionform.show', compact('personnelForm'));
    }
}
