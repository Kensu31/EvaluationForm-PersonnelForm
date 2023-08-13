<?php

namespace App\Http\Controllers;

use App\Models\EmployeeEvaluation;
use App\Models\EvaluationForm;
use App\Models\EvaluationFormAnswer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EvaluationController extends Controller
{
    public function index()
    {
        $records = EvaluationForm::all();
        return view('/evaluationform.view')->with('records', $records);
    }
    public function show($id){
        $evaluationForm = EvaluationForm::with(
            'evaluationFormAnswer'
        )->find($id);

        return view('evaluationform.show',compact('evaluationForm'));
    }
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'employee_name' => 'required',
            'reviewer' => 'required',
            'job_title' => 'required',
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
        
        $evaluationForm = EvaluationForm::create([
            'employee_name' =>$request->employee_name,
            'job_title' => $request->job_title,
            'reviewer' => $request->reviewer,
            'review_period' => $request->review_period,
            'rating' => $overallscore
        ]);
        if($evaluationForm){
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
        }
        
        session()->flash('success', 'Successfully Submit Evaluation Form');
        return redirect('/');
    }
}