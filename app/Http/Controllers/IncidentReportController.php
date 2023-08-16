<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\IncidentReportForm;
use Illuminate\Http\Request;

class IncidentReportController extends Controller
{
    public function index(){
        $employee = Employee::all();
        $reports = IncidentReportForm::with('employee')->get();
        return view('/Incidentreportform.view')->with('reports', $reports)->with('employee',$employee);
    }
    public function create($id){
        $employeeInfo = Employee::findOrFail($id);
        return view('Incidentreportform.form',compact('employeeInfo'));
    }
    public function show($id){
        $incidentReportForm = IncidentReportForm::with(
            'employee','incidentReportFormAnswer'
        )->find($id);
        return view('Incidentreportform.show',compact('incidentReportForm'));
    }

    public function store(Request $request){
        
        $request->validate([
            'location' => 'required',
            'report_date' => 'required|date',
            'incident_date' => 'required|date',
            'incident_time' => 'required',
            'incident_details'=> 'required',
            'cause' => 'required',
            'recommendation'=> 'required',
            'reportedby'=> 'required',
            'position'=> 'required',
            'department'=> 'required',
            'supervisor'=> 'required',
        ]);
        
        $employeeNumber = Employee::findOrFail($request->employee_id);
        
        if($employeeNumber){
            $incidentReport = $employeeNumber->incidentReportForm()->create([
                'report_date' => $request->report_date,
                
            ]);
            
            if($incidentReport)
            {
                $incidentReportAnswer = $incidentReport->incidentReportFormAnswer()->create([
                    'location'=> $request->location,
                    'incident_date'=> $request->incident_date,
                    'incident_time'=> $request->incident_time,
                    'incident_details'=> $request->incident_details,
                    'cause'=> $request->cause,
                    'recommendation'=> $request->recommendation,
                    'reportedby'=> $request->reportedby,
                    'position'=> $request->position,
                    'department'=> $request->department,
                    'supervisor'=> $request->supervisor,
                ]);
                if($incidentReportAnswer){
                    session()->flash('success', 'Successfully Submit  Incident Report');
                    return redirect('/');
                }
            }
        }
    }
}
