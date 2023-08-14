@extends('layouts.app')
@section('title')
    Evaluation Form
@endsection
@section('content')
    <style>
        body {
            font-size: 13px;
        }

        small {
            font-size: 12px;
        }

        input[type='radio'] {
            cursor: not-allowed;
            pointer-events: none;
        }

        input {
            font-size: 13px !important;
        }

        table {
            font-size: 13px !important;
        }

        @media(max-width: 767px) {
            table {
                width: 100% !important;
                background-color: red;
                flex-wrap: wrap !important;
            }
        }
    </style>
    <div class="container-fluid">
        <div class="card m-auto mt-5 mb-5 border p-3 rounded rounded-4" style="width:70%">
            <div class="card-tit">
                <h1 class="m-3 fst-italic">Employee Evaluation Form</h1>
            </div>
            <div class="card-body">
                <form action="/submit-evaluation-form" method="POST" class="row g-3 pb-4">
                    @csrf
                    <div class="col-md-10">
                        <h4 class="fw-bold">I. EMPLOYEE INFORMATION</h4>
                    </div>
                    <div class="row px-5">
                        <div class="col-md-3">
                            <label for="employee_name" class="form-label">Employee name:</label>
                            <input type="text"
                                class="form-control border shadow-sm @error('employee_name')
                                border-danger
                            @else
                            border-dark
                            @enderror"
                                name="employee_name" value="{{ $evaluationForm->employee_name }}" readonly />
                            @error('employee_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="job_title" class="form-label">Job Title:</label>
                            <input type="text"
                                class="form-control border shadow-sm @error('job_title')
                            border-danger
                        @else
                        border-dark
                        @enderror"
                                name="job_title" value="{{ $evaluationForm->job_title }}" readonly>
                            @error('job_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="reviewer" class="form-label">Supervisor/Reviewer:</label>
                            <input type="text"
                                class="form-control border shadow-sm @error('reviewer')
                            border-danger
                        @else
                        border-dark
                        @enderror"
                                name="reviewer" value="{{ $evaluationForm->reviewer }}" readonly>
                            @error('reviewer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="inputAddress" class="form-label">Review Period:</label>
                            <input type="date"
                                class="form-control border shadow-sm  @error('review_period')
                            border-danger
                        @else
                        border-dark
                        @enderror"
                                name="review_period" value="{{ $evaluationForm->review_period }}" readonly>
                            @error('review_period')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-10 mt-2 ">
                        <h4 class="fw-bold">II. CORE VALUES AND OBJECTIVES</h4>
                    </div>
                    <table class="table table-striped border border-dark shadow-sm ">
                        <thead>
                            <tr class="table-dark">
                                <th class="col-md-4 text-center p-3">PERFORMANCE CATEGORY</th>
                                <th class="col-md-8 text-center p-3" colspan="4">RATING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="form-group">
                                <td class="col-md-4">
                                    <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Quality of
                                            Work:</span><br>Work is completed accurately(few or no errors), efficiently
                                        and within deadlines with minimal supervision</p>
                                    @error('Quality_Work')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                                <td class="col-md-8 text-center align-middle">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Quality_Work" value="4"
                                            @if ($evaluationForm->evaluationFormAnswer->Quality_Work == 4) checked @endif>
                                        <label class="form-check-label">Exceeds expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Quality_Work" value="3"
                                            @if ($evaluationForm->evaluationFormAnswer->Quality_Work == 3) checked @endif>
                                        <label class="form-check-label">Meets expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Quality_Work" value="2"
                                            @if ($evaluationForm->evaluationFormAnswer->Quality_Work == 2) checked @endif>
                                        <label class="form-check-label" for="">Needs improvements</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Quality_Work" value="1"
                                            @if ($evaluationForm->evaluationFormAnswer->Quality_Work == 1) checked @endif>
                                        <label class="form-check-label" for="">Unacceptable</label>
                                    </div>
                                </td>
                                {{-- <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td> --}}
                            </tr>

                            <tr>
                                <td class="col-md-4 ">
                                    <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Attendance &
                                            Punctuality:</span><br>Reports for work on time, provides advance notice of
                                        need for absence</p>
                                    @error('Attendance_Punctuality')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                                <td class="col-md-8 text-center align-middle">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                            value="4" @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 4) checked @endif>
                                        <label class="form-check-label">Exceeds expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                            value="3" @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 3) checked @endif>
                                        <label class="form-check-label">Meets expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                            value="2" @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 2) checked @endif>
                                        <label class="form-check-label" for="">Needs improvements</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                            value="1" @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 1) checked @endif>
                                        <label class="form-check-label" for="">Unacceptable</label>
                                    </div>
                                </td>
                                {{-- <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td> --}}
                            </tr>

                            <tr>
                                <td class="col-md-4 ">
                                    <p class="p-3 fst-italic fs-7"><span
                                            class="fw-bold fs-5">Reliability/Dependability:</span><br>Consistently
                                        performs at a high level; manages time and workload effectively to meet
                                        responsibilities</p>
                                    @error('Reliability')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                                <td class="col-md-8 text-center align-middle">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Reliability" value="4"
                                            @if ($evaluationForm->evaluationFormAnswer->Reliability == 4) checked @endif>
                                        <label class="form-check-label">Exceeds expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Reliability" value="3"
                                            @if ($evaluationForm->evaluationFormAnswer->Reliability == 3) checked @endif>
                                        <label class="form-check-label">Meets expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Reliability" value="2"
                                            @if ($evaluationForm->evaluationFormAnswer->Reliability == 2) checked @endif>
                                        <label class="form-check-label" for="">Needs improvements</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Reliability" value="1"
                                            @if ($evaluationForm->evaluationFormAnswer->Reliability == 1) checked @endif>
                                        <label class="form-check-label" for="">Unacceptable</label>
                                    </div>
                                </td>
                                {{-- <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                       
                                    </td> --}}
                            </tr>

                            <tr>
                                <td class="col-md-4 ">
                                    <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Communication
                                            Skills:</span><br>Written and oral communnications are clear, organized and
                                        effective; listens and comprehends well</p>
                                    @error('Communication')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                                <td class="col-md-8 text-center align-middle">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Communication == 4) checked @endif name="Communication"
                                            value="4">
                                        <label class="form-check-label">Exceeds expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Communication == 3) checked @endif name="Communication"
                                            value="3">
                                        <label class="form-check-label">Meets expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Communication == 2) checked @endif name="Communication"
                                            value="2">
                                        <label class="form-check-label" for="">Needs improvements</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Communication == 1) checked @endif name="Communication"
                                            value="1">
                                        <label class="form-check-label" for="">Unacceptable</label>
                                    </div>
                                </td>
                                {{-- <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td> --}}
                            </tr>

                            <tr>
                                <td class="col-md-4 ">
                                    <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Judgment &
                                            Decision-making:</span><br>Makes thoughtful, well-reasoned decisions;
                                        exercises good judgment, resourcefulness and creativity in problem-solving</p>
                                    @error('Judgment')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                                <td class="col-md-8 text-center align-middle">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Judgment == 4) checked @endif name="Judgment"
                                            value="4">
                                        <label class="form-check-label">Exceeds expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Judgment == 3) checked @endif name="Judgment"
                                            value="3">
                                        <label class="form-check-label">Meets expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Judgment == 2) checked @endif name="Judgment"
                                            value="2">
                                        <label class="form-check-label" for="">Needs improvements</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Judgment == 1) checked @endif name="Judgment"
                                            value="1">
                                        <label class="form-check-label" for="">Unacceptable</label>
                                    </div>
                                </td>
                                {{-- <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                       
                                    </td> --}}
                            </tr>

                            <tr>
                                <td class="col-md-4 ">
                                    <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Initiative &
                                            flexibility:</span><br>Demonstrates initiative, often seeking out additional
                                        responsibility; identifies problems and solutions; thrives on new challenges and
                                        adjust to unexpected changes</p>
                                    @error('Initiative')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                                <td class="col-md-8 text-center align-middle">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Initiative == 4) checked @endif name="Initiative"
                                            value="4">
                                        <label class="form-check-label">Exceeds expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Initiative == 3) checked @endif name="Initiative"
                                            value="3">
                                        <label class="form-check-label">Meets expectations</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Initiative == 2) checked @endif name="Initiative"
                                            value="2">
                                        <label class="form-check-label" for="">Needs improvements</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            @if ($evaluationForm->evaluationFormAnswer->Initiative == 1) checked @endif name="Initiative"
                                            value="1">
                                        <label class="form-check-label" for="">Unacceptable</label>
                                    </div>
                                </td>
                                {{-- <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                       
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td> --}}
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-10 mt-4">
                        <h4 class="fw-bold">III. JOB-SPECIFIC PERFORMANCE CRITERIA</h4>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped border border-dark shadow-sm">
                            <thead>
                                <tr class="table-dark">
                                    <th class="col-md-4 text-center p-3">PERFORMANCE CATEGORY</th>
                                    <th class="col-md-8 text-center p-3" colspan="4">RATING</th>
                                </tr>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-4 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Knowledge of
                                                Position:</span><br>Possessees required skills, knowledge, and abilities to
                                            compentently perform the job</p>
                                        @error('Knowledge')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-8 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Knowledge == 4) checked @endif name="Knowledge"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Knowledge == 3) checked @endif name="Knowledge"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Knowledge == 2) checked @endif name="Knowledge"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Knowledge == 1) checked @endif name="Knowledge"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                    {{-- <td class="col-md-2 text-center align-middle">

                                    </td>
                                    <td class="col-md-2 text-center align-middle">

                                    </td>
                                    <td class="col-md-2 text-center align-middle">

                                    </td> --}}
                                </tr>

                                <tr>
                                    <td class="col-md-4 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Training &
                                                Development:</span><br>Continually seeks ways to strengthen performance and
                                            regularly monitors new developments in field of work</p>
                                        @error('Training')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-8 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Training == 4) checked @endif name="Training"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Training == 3) checked @endif name="Training"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Training == 2) checked @endif name="Training"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                @if ($evaluationForm->evaluationFormAnswer->Training == 1) checked @endif name="Training"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                    {{-- <td class="col-md-2 text-center align-middle">
                                        
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                       
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container mt-2">
                        <h4 class="fw-bold">IV. PERFORMANCE GOALS</h4>
                        <div class="container">
                            <div class="mb-3">
                                <label for="exampleTextarea" class="form-label">Set objectives and outline steps to
                                    improve in problem areas or further employee developement.</label>
                                <textarea
                                    class="form-control border shadow-sm @error('Performance')
                                border-danger
                                @else
                                border-dark
                                @enderror"
                                    name="Performance" placeholder="Enter text here" rows="5" style="resize: none" readonly>{{ $evaluationForm->evaluationFormAnswer->Performance }}</textarea>
                                @error('Performance')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <h4 class="fw-bold">VI. EMPLOYEE COMMENTS(OPTIONAL)</h4>
                        <div class="container">
                            <div class="mb-3">
                                <label for="exampleTextarea" class="form-label">Comments</label>
                                <textarea class="form-control border border-dark shadow-sm" name="Comments" placeholder="Enter comment here"
                                    rows="5" style="resize:none" readonly>{{ $evaluationForm->evaluationFormAnswer->Comments }}</textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="/generate-print/{{ $evaluationForm->id }}" target="_blank"
                                class="btn btn-success px-2 py-2  mt-2 shadow" id="btnprint"> <i
                                    class="fas fa-print px-1" style="font-size:15px"></i> Print</a>
                            <button type="" class="btn btn-primary fs-6 px-4 py-2  mt-2 shadow" id="btncancel"> <i
                                    class="fas fa-door-open px-1" style="font-size:15px"></i> Back</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('btncancel').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = '/view-evaluation-form';

        });
    </script>
@endsection
