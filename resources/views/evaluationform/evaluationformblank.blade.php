@extends('layouts.app')
@section('title')
    Print
@endsection
@section('content')
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

                </div>
                <div class="col-3 text-end">
                    <p> <strong> Job Title: </strong></p>
                </div>
                <div class="col-3">

                </div>
            </div>
            <div class="row container m-auto">
                <div class="col-3 text-end">
                    <p> <strong> Supervisor/Reviewer:</strong></p>
                </div>
                <div class="col-3">

                </div>
                <div class="col-3 text-end">
                    <p> <strong> Review Period: </strong></p>
                </div>
                <div class="col-3">

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
                                <input class="form-check-input" type="radio" name="Quality_Work" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Quality_Work" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Quality_Work" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Quality_Work" value="1">
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
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Attendance_Punctuality" value="1">
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
                                <input class="form-check-input" type="radio" name="Reliability" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Reliability" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Reliability" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Reliability" value="1">
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
                                <input class="form-check-input" type="radio" name="Communication" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Communication" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Communication" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Communication" value="1">
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
                                <input class="form-check-input" type="radio" name="Judgment" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Judgment" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Judgment" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Judgment" value="1">
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
                                <input class="form-check-input" type="radio" name="Initiative" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Initiative" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Initiative" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Initiative" value="1">
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
                                <input class="form-check-input" type="radio" name="Knowledge" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Knowledge" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Knowledge" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Knowledge" value="1">
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
                                <input class="form-check-input" type="radio" name="Training" value="4">
                                <label class="form-check-label">Exceeds expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Training" value="3">
                                <label class="form-check-label">Meets expectations</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Training" value="2">
                                <label class="form-check-label" for="">Needs improvements</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Training" value="1">
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
                            name="Performance" rows="5" style="resize: none"></textarea>
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
                        <textarea class="form-control border border-dark shadow-sm" name="Comments" rows="5" style="resize:none"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
