@extends('layouts.app')
@section('title')
    Print
@endsection
@section('content')
    <style>
        input[type='radio'] {
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
    <div class="container-fluid align-middle">
        <div class="container-fluid">
            <img src="https://dummyimage.com/50x50/000/fff" class="col img-thumbnail" alt="" width="">
            <h3 class="d-inline-flex">Employee's Evaluation Form</h3>
        </div>
        <div class="container-fluid mt-2">

            <div class="row container m-auto">
                <div class="col-3 text-end">
                    <p> <strong> Employee's Name:</strong></p>
                </div>
                <div class="col-3">
                    <span style="text-transform:uppercase">{{ $evaluationForm->employee->last_name }}
                        {{ $evaluationForm->employee->first_name }}</span>
                </div>
                <div class="col-3 text-end">
                    <p> <strong> Job Title: </strong></p>
                </div>
                <div class="col-3">
                    <span style="text-transform:uppercase">{{ $evaluationForm->employee->position }}</span>
                </div>
            </div>
            <div class="row container m-auto">
                <div class="col-3 text-end">
                    <p> <strong> Supervisor/Reviewer:</strong></p>
                </div>
                <div class="col-3">
                    <span style="text-transform:uppercase">{{ $evaluationForm->reviewer }}</span>
                </div>
                <div class="col-3 text-end">
                    <p> <strong> Review Period: </strong></p>
                </div>
                <div class="col-3">
                    <span style="text-transform:uppercase">{{ $evaluationForm->review_period }}</span>
                </div>
            </div>
        </div>
        <div class="container mt-3 m-auto" style="font-size:13px!important;">
            <table class="table table-striped border border-dark shadow-sm ">
                <thead>
                    <tr class="table-dark">
                        <th class="col-md-5 text-center ">PERFORMANCE CATEGORY</th>
                        <th class="col-md-8 text-center " colspan="4">RATING</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="form-group">
                        <td class="col-md-4 ">
                            <p class=" fst-italic fs-7"><span class="fw-bold">Quality of
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
                    </tr>

                    <tr>
                        <td class="col-md-4 ">
                            <p class=" fst-italic fs-7"><span class="fw-bold">Attendance &
                                    Punctuality:</span><br>Reports for work on time, provides advance notice of
                                need for absence</p>
                            @error('Attendance_Punctuality')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                        <td class="col-md-8 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="4"
                                    @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 4) checked @endif>
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="3"
                                    @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 3) checked @endif>
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="2"
                                    @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 2) checked @endif>
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="1"
                                    @if ($evaluationForm->evaluationFormAnswer->Attendance_Punctuality == 1) checked @endif>
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td class="col-md-4 ">
                            <p class=" fst-italic fs-7"><span
                                    class="fw-bold">Reliability/Dependability:</span><br>Consistently
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
                    </tr>

                    <tr>
                        <td class="col-md-4 ">
                            <p class=" fst-italic fs-7"><span class="fw-bold">Communication
                                    Skills:</span><br>Written and oral communnications are clear, organized and
                                effective; listens and comprehends well</p>
                            @error('Communication')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                        <td class="col-md-8 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Communication" value="4"
                                    @if ($evaluationForm->evaluationFormAnswer->Communication == 4) checked @endif>
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Communication" value="3"
                                    @if ($evaluationForm->evaluationFormAnswer->Communication == 3) checked @endif>
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Communication" value="2"
                                    @if ($evaluationForm->evaluationFormAnswer->Communication == 2) checked @endif>
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Communication" value="1"
                                    @if ($evaluationForm->evaluationFormAnswer->Communication == 1) checked @endif>
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-4 ">
                            <p class=" fst-italic fs-7"><span class="fw-bold">Judgment &
                                    Decision-making:</span><br>Makes thoughtful, well-reasoned decisions;
                                exercises good judgment, resourcefulness and creativity in problem-solving</p>
                            @error('Judgment')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                        <td class="col-md-8 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Judgment" value="4"
                                    @if ($evaluationForm->evaluationFormAnswer->Judgment == 4) checked @endif>
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Judgment" value="3"
                                    @if ($evaluationForm->evaluationFormAnswer->Judgment == 3) checked @endif>
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Judgment" value="2"
                                    @if ($evaluationForm->evaluationFormAnswer->Judgment == 2) checked @endif>
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Judgment" value="1"
                                    @if ($evaluationForm->evaluationFormAnswer->Judgment == 1) checked @endif>
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-4 ">
                            <p class=" fst-italic fs-7"><span class="fw-bold">Initiative &
                                    flexibility:</span><br>Demonstrates initiative, often seeking out additional
                                responsibility; identifies problems and solutions; thrives on new challenges and
                                adjust to unexpected changes</p>
                            @error('Initiative')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                        <td class="col-md-8 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Initiative" value="4"
                                    @if ($evaluationForm->evaluationFormAnswer->Initiative == 4) checked @endif>
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Initiative" value="3"
                                    @if ($evaluationForm->evaluationFormAnswer->Initiative == 3) checked @endif>
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Initiative" value="2"
                                    @if ($evaluationForm->evaluationFormAnswer->Initiative == 2) checked @endif>
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Initiative" value="1"
                                    @if ($evaluationForm->evaluationFormAnswer->Initiative == 1) checked @endif>
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-4 ">
                            <p class=" fst-italic fs-7"><span class="fw-bold">Knowledge of
                                    Position:</span><br>Possessees required skills, knowledge, and abilities to
                                compentently perform the job</p>
                            @error('Knowledge')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                        <td class="col-md-8 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Knowledge" value="4"
                                    @if ($evaluationForm->evaluationFormAnswer->Knowledge == 4) checked @endif>
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Knowledge" value="3"
                                    @if ($evaluationForm->evaluationFormAnswer->Knowledge == 3) checked @endif>
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Knowledge" value="2"
                                    @if ($evaluationForm->evaluationFormAnswer->Knowledge == 2) checked @endif>
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Knowledge" value="1"
                                    @if ($evaluationForm->evaluationFormAnswer->Knowledge == 1) checked @endif>
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-4 ">
                            <p class="fst-italic fs-7"><span class="fw-bold">Training &
                                    Development:</span><br>Continually seeks ways to strengthen performance and
                                regularly monitors new developments in field of work</p>
                            @error('Training')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                        <td class="col-md-8 text-center align-middle">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Training" value="4"
                                    @if ($evaluationForm->evaluationFormAnswer->Training == 4) checked @endif>
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Training" value="3"
                                    @if ($evaluationForm->evaluationFormAnswer->Training == 3) checked @endif>
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Training" value="2"
                                    @if ($evaluationForm->evaluationFormAnswer->Training == 2) checked @endif>
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Training" value="1"
                                    @if ($evaluationForm->evaluationFormAnswer->Training == 1) checked @endif>
                                <label class="form-check-label" for="">Unacceptable</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="container mt-2">
                <h4 class="fw-bold"> PERFORMANCE GOALS</h4>
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
                            name="Performance" readonly rows="5" style="resize: none">{{ $evaluationForm->evaluationFormAnswer->Performance }}</textarea>
                        @error('Performance')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <h4 class="fw-bold">EMPLOYEE COMMENTS(OPTIONAL)</h4>
                <div class="container">
                    <div class="mb-3">
                        <label for="exampleTextarea" class="form-label">Comments</label>
                        <textarea class="form-control border border-dark shadow-sm" readonly name="Comments" rows="5"
                            style="resize:none">{{ $evaluationForm->evaluationFormAnswer->Comments }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
