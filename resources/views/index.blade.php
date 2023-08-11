
@extends('layouts.app')
@section('title')
    Evaluation Form
@endsection
@section('content')
<div class="container mt-5">
    @if(session()->has('success'))
    <div class="alert alert-success">

        {{ session()->get('success') }}

    </div>
@endif
</div>
<div class="container">
    <div class="card m-auto mt-5 mb-5 border shadow p-3 rounded rounded-4" style="width:90%">
        <div class="card-tit"><h1 class="m-3 fst-italic">Employee Evaluation Form</h1></div>
    <div class="card-body">

    <form action="submit-form" method="POST" class="row g-3 pb-4" >
        @csrf
        
        <div class="col-md-10">
            <h4 class="fw-bold">I. EMPLOYEE INFORMATION</h4>
        </div>
       <div class="row px-5 py-2">
            <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Employee name:</label>
            <input type="text" class="form-control border border-dark shadow-sm" name="employee_name" id="inputEmail4"/>
            @error('employee_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Job Title:</label>
                <input type="text" class="form-control border border-dark shadow-sm" name="job_title" id="inputEmail4">
                @error('job_title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Supervisor/Reviewer:</label>
            <input type="text" class="form-control border border-dark shadow-sm" name="reviewer" id="inputPassword4">
            @error('reviewer')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="col-md-3">
            <label for="inputAddress" class="form-label">Review Period:</label>
            <input type="date" class="form-control border border-dark shadow-sm" name="review_period" id="inputAddress">
            @error('review_period')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="col-md-10 mt-5">
                <h4 class="fw-bold">II. CORE VALUES AND OBJECTIVES</h4>
            </div>
        </div>
        <div class="table-responsive px-5">
            <table class="table table-striped border border-dark shadow-sm ">
                <thead>
                    <tr class="table-dark">
                        <th class="col-md-4 text-center p-3" >PERFORMANCE CATEGORY</th>
                        <th class="col-md-8 text-center p-3" colspan="4">RATING</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="form-group">
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Quality of Work:</span><br>Work is completed accurately(few or no errors), efficiently and within deadlines with minimal supervision</p>
                            @error('ratingQuality')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingQuality" value="1">
                                <label class="form-check-label" >Exceeds expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingQuality" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingQuality" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingQuality" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Attendance & Punctuality:</span><br>Reports for work on time, provides advance notice of need for absence</p>
                            @error('ratingAttendance')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingAttendance" value="1">
                                <label class="form-check-label" >Exceeds expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingAttendance" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingAttendance" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>  
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingAttendance" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Reliability/Dependability:</span><br>Consistently performs at a high level; manages time and workload effectively to meet responsibilities</p>
                            @error('ratingReliability')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingReliability" value="1">
                                <label class="form-check-label" >Exceeds expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingReliability" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingReliability" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingReliability" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Communication Skills:</span><br>Written and oral communnications are clear, organized and effective; listens and comprehends well</p>
                            @error('ratingCommunication')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingCommunication" value="1">
                                <label class="form-check-label" >Exceeds expectations</label>      
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingCommunication" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingCommunication" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>  
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingCommunication" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Judgment & Decision-making:</span><br>Makes thoughtful, well-reasoned decisions; exercises good judgment, resourcefulness and creativity in problem-solving</p>
                            @error('ratingJudgment')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingJudgment" value="1">
                                <label class="form-check-label" >Exceeds expectations</label>   
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingJudgment" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingJudgment" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingJudgment" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Initiative & flexibility:</span><br>Demonstrates initiative, often seeking out additional responsibility; identifies problems and solutions; thrives on new challenges and adjust to unexpected changes</p>
                            @error('ratingInitiative')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingInitiative" value="1">
                                <label class="form-check-label" >Exceeds expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingInitiative" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingInitiative" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingInitiative" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-10 mt-4">
            <h4 class="fw-bold">III. JOB-SPECIFIC PERFORMANCE CRITERIA</h4>
        </div>
        <div class="table-responsive px-5 mt-4">
            <table class="table table-striped border border-dark shadow-sm">
                <thead>
                        <tr class="table-dark">
                            <th class="col-md-4 text-center p-3" >PERFORMANCE CATEGORY</th>
                             <th class="col-md-8 text-center p-3" colspan="4">RATING</th>
                        </tr>
                    <tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Knowledge of Position:</span><br>Possessees required skills, knowledge, and abilities to compentently perform the job</p>
                            @error('ratingKnowledge')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingKnowledge" value="1">
                                <label class="form-check-label" >Exceeds expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingKnowledge" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingKnowledge" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingKnowledge" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                   
                    <tr>
                        <td class="col-md-5 "><p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Training & Development:</span><br>Continually seeks ways to strengthen performance and regularly monitors new developments in field of work</p>
                            @error('ratingTraining')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ratingTraining" value="1">
                            <label class="form-check-label" >Exceeds expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingTraining" value="2">
                                <label class="form-check-label" >Meets expectations</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingTraining" value="3">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                        </td>
                        <td class="col-md-2 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ratingTraining" value="4">
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container mt-2">
            <h4 class="fw-bold">IV. PERFORMANCE GOALS</h4>
            <div class="container">
                <div class="mb-3">
                  <label for="exampleTextarea" class="form-label">Set objectives and outline steps to improve in problem areas or further employee developement.</label>
                  <textarea class="form-control border border-dark shadow-sm" name="goals" placeholder="Enter text here" rows="5"></textarea>
                  @error('goals')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
            </div>
        </div>
    </div> 
        <div class="container mt-3">
            <h4 class="fw-bold">VI. EMPLOYEE COMMENTS(OPTIONAL)</h4>
            <div class="container">
                <div class="mb-3">
                  <label for="exampleTextarea" class="form-label">Comment</label>
                  <textarea class="form-control border border-dark shadow-sm" name="comments" placeholder="Enter comment here" rows="5"></textarea>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary fs-6 px-4 py-2  mt-2 shadow">Submit Evaluation</button>
        </div>
      </form>
    </div>
</div>
</div>
@endsection



   
    
