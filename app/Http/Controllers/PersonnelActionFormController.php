<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\BenefitAdjustment;
use App\Models\Employee;
use App\Models\GeneralRemark;
use App\Models\PersonnelForm;
use App\Models\PositionMovement;
use App\Models\SalaryAdjustment;
use Illuminate\Http\Request;


class PersonnelActionFormController extends Controller
{
    public function index()
    {
        $PersonnelForm =PersonnelForm::with('employee')->get();
        $Employee = Employee::all();
        return view('personalactionform.view')->with('personnelForm',$PersonnelForm)->with('employee',$Employee);
    }
        public function create($id){
            $employeeInfo = Employee::findOrFail($id);
           return view('personalactionform.form',compact('employeeInfo'));

            
        }
    public function update(Request $request,$id){
        $request->validate([
            'date_prepared' => 'required|date',
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

        if($personnelForm){

            $positionMovements = PositionMovement::where('personnel_form_id',$personnelForm->id)->first();
            $salaryAdjustment = SalaryAdjustment::where('personnel_form_id',$personnelForm->id)->first();
            $benefitsAdjustment = BenefitAdjustment::where('personnel_form_id',$personnelForm->id)->first();
            $generalRemark = GeneralRemark::where('personnel_form_id',$personnelForm->id)->first();
            $approval = Approval::where('personnel_form_id',$personnelForm->id)->first();

            $personnelForm->update([
                'date_prepared' => $request->date_prepared,
            ]);
        }
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
        session()->flash('success', 'Successfully Update Personnel Action Form');
        return redirect('/view-forms');

    }

    public function delete($id){
        $personnelForm = PersonnelForm::findOrFail($id);
        $personnelForm->delete();

        session()->flash('success', 'Successfully Delete Personnel Action Form');
        return redirect('/view-forms');
    }


    public function store(Request $request)
    {
        $request->validate([
            'date_prepared' => 'required|date',
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
        $employeeNumber = Employee::findOrFail($request->employee_number);
        
        if($employeeNumber){
            $personnelForm = $employeeNumber->personnelForm()->create([
                'date_prepared' => $request->date_prepared,
            ]);
            if($personnelForm){
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
                if($position){
                    $salaryAdjustment = $personnelForm->salaryAdjustments()->create([
                        'reason_for_upgrade' => $request->radioUpgradeSalary,
                        'effective_date' => $request->radioEffectiveDateSalary,
                        'basic_salary_from' => $request->basic_salary_from,
                        'basic_salary_to' => $request->basic_salary_to,
                    ]);
                    if($salaryAdjustment){
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
                        if($additionalCharge){
                            $generalRemark = $personnelForm->generalRemarks()->create([
                                'remarkable_performance' => $request->input('remarkable_performance'),
                                'rooms_for_improvements' => $request->input('rooms_for_improvements'),
                            ]);
                            if($generalRemark){
                                $approval = $personnelForm->approvals()->create([
                                    'manager_name' => $request->manager_name,
                                    'received' => $request->received,
                                    'approval_date' => $request->approval_date,
                                ]);
                                if($generalRemark){
                                    session()->flash('success', 'Successfully Submit Personnel Action Form');
                                    return redirect('/view-forms');
                                }
                                
                            }
                        }
                    }
                }
            }
        }
        else
        {
            session()->flash('success', 'Error');
                                    return redirect('/view-forms');
        }
    }
    public function show($id){
        $personnelForm = PersonnelForm::with([
            'positionMovements',
            'salaryAdjustments',
            'benefitAdjustments',
            'generalRemarks',
            'approvals',
            'employee',
        ])->find($id);

        return view('personalactionform.show', compact('personnelForm'));
    }
}
