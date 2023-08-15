<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\EmployeeEvaluation;
use App\Models\EvaluationForm;
use App\Models\EvaluationFormAnswer;
use App\Models\Forms;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EvaluationController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
       $records = EvaluationForm::with('employee')->get();
        return view('/evaluationform.view')->with('records', $records)->with('employee',$employee);
    }
    public function create($id){
        $employeeInfo = Employee::findOrFail($id);
        return view('evaluationform.form',compact('employeeInfo'));
    }
    public function show($id){
        $evaluationForm = EvaluationForm::with(
            'employee','evaluationFormAnswer'
        )->find($id);

        return view('evaluationform.show',compact('evaluationForm'));
    }
    public function delete($id){
        $evaluationForm = EvaluationForm::findOrFail($id);
        $evaluationForm->delete();

        session()->flash('success', 'Successfully Delete Evaluation Form');
        return redirect('/view-evaluation-form');
    }



    public function store(Request $request)
    {

        $validateData = $request->validate([
            'reviewer' => 'required',
            'review_period' => 'required|date',
            'Quality_Work' => 'required|numeric',
            'Attendance_Punctuality' => 'required|numeric',
            'Reliability' => 'required|numeric',
            'Communication' => 'required|numeric',
            'Judgment' => 'required|numeric',
            'Initiative' => 'required|numeric',
            'Knowledge' => 'required|numeric',
            'Training' => 'required|numeric',
            'rating' => 'nullable',
            'Performance' => 'required',
            'Comments' => 'nullable',
        ]);
        $overallscore = 0;
        $ratingQuality = $validateData['Quality_Work'];
        $ratingAttendance = $validateData['Attendance_Punctuality'];
        $ratingReliability = $validateData['Reliability'];
        $ratingCommunication = $validateData['Communication'];
        $ratingJudgment = $validateData['Judgment'];
        $ratingInitiative = $validateData['Initiative'];
        $ratingKnowledge = $validateData['Knowledge'];
        $ratingTraining = $validateData['Training'];
        $overallscore = ($ratingQuality + $ratingAttendance + $ratingReliability + $ratingCommunication + $ratingJudgment + $ratingInitiative + $ratingKnowledge + $ratingTraining) / 8;
         $employeeInfo = Employee::findOrFail($request->employee_id);
         if($employeeInfo)
         {
            $evaluationForm = $employeeInfo->evaluationForm()->create([
                        'reviewer' => $request->reviewer,
                        'review_period' => $request->review_period,
                        'rating' => $overallscore
                    ]);
            if($evaluationForm)
            {
                $evaluationAnswer = $evaluationForm->evaluationFormAnswer()->create([
                            'Quality_Work' => $request->Quality_Work,
                            'Attendance_Punctuality' => $request->Attendance_Punctuality,
                            'Reliability' => $request->Reliability,
                            'Communication' => $request->Communication,
                            'Judgment'=> $request->Judgment,
                            'Initiative'=> $request->Initiative,
                            'Knowledge'=> $request->Knowledge,
                            'Training'=> $request->Training,
                            'Performance'=> $request->Performance,
                            'Comments'=> $request->Comments,
                        ]);
                        if($evaluationAnswer)
                        {
                            session()->flash('success', 'Successfully Submit Evaluation Form');
                            return redirect('/view-evaluation-form');
                        }
            }
         }
        
        
    }
    public function print($id){
        $evaluationForm = EvaluationForm::with(
            'employee','evaluationFormAnswer'
        )->find($id);

        return view('evaluationform.pdf',compact('evaluationForm'));
    }
}