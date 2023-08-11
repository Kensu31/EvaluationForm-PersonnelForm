<?php

namespace App\Http\Controllers;

use App\Models\EmployeeEvaluation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EvaluationController extends Controller
{
    public function index()
    {
        $records = EmployeeEvaluation::all();
        return view('display')->with('records', $records);
    }
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'employee_name' => 'required',
            'reviewer' => 'required',
            'job_title' => 'required',
            'review_period' => 'required|date',
            'ratingQuality' => 'required|integer',
            'ratingAttendance' => 'required|integer',
            'ratingReliability' => 'required|integer',
            'ratingCommunication' => 'required|integer',
            'ratingJudgment' => 'required|integer',
            'ratingInitiative' => 'required|integer',
            'ratingKnowledge' => 'required|integer',
            'ratingTraining' => 'required|integer',
            'ratingScore' => 'nullable',
            'goals' => 'required',
            'comments' => 'nullable',
        ]);
        $overallscore = 0;

        $ratingQuality = $validateData['ratingQuality'];
        $ratingAttendance = $validateData['ratingAttendance'];
        $ratingReliability = $validateData['ratingReliability'];
        $ratingCommunication = $validateData['ratingCommunication'];
        $ratingInitiative = $validateData['ratingInitiative'];
        $ratingKnowledge = $validateData['ratingKnowledge'];
        $ratingTraining = $validateData['ratingTraining'];

        $overallscore = ($ratingQuality + $ratingAttendance + $ratingReliability + $ratingCommunication + $ratingInitiative + $ratingKnowledge + $ratingTraining) / 8;
        $evaluation = new EmployeeEvaluation($validateData);
        $evaluation->ratingScore = $overallscore;
        $evaluation->save();

        session()->flash('success', 'Successfully Submit Evaluation Form');
        return redirect('/');




    }
}