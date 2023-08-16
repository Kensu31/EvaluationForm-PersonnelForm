@extends('layouts.app')
@section('title')
    Print
@endsection
@section('content')
    <div class="container-fluid align-middle">

        <div class="container text-center m-auto">
            <img src="https://dummyimage.com/50x50/000/fff" class="col img" alt="" width="">
            <h3 class="fw-bold">EMPLOYEE EVALUATION FORM</h3>
        </div>
        <div class="row container m-auto">
            <h5 class="fw-bold">I. EMPLOYEE INFORMATION</h5>
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
        <div class="row container m-auto">
            <h5 class="fw-bold">II. CORE VALUES AND OBJECTIVES</h5>
        </div>
        <div class="container mt-3 m-auto" style="font-size:13px!important;">
            <table class="table table-striped border border-dark shadow-sm ">
                <thead>
                    <tr class="table-dark">
                        <th class="col-md-4 text-center ">PERFORMANCE CATEGORY</th>
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
                </tbody>
            </table>
            <div class="row container m-auto">
                <h5 class="fw-bold">III. JOB-SPECIFIC PERFORMANCE CRITERIA</h5>
            </div>
            <table class="table table-striped border border-dark shadow-sm">
                <thead>
                    <tr class="table-dark">
                        <th class="col-md-4 text-center ">PERFORMANCE CATEGORY</th>
                        <th class="col-md-8 text-center " colspan="4">RATING</th>
                    </tr>
                </thead>
                <tbody>
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
                <div class="row container m-auto">
                    <h5 class="fw-bold">IV. PERFORMANCE GOALS</h5>
                </div>
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
                            name="Performance" rows="4" style="resize: none"></textarea>
                        @error('Performance')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row container m-auto">
                    <h5 class="fw-bold">V.OVERALL RATING</h5>
                </div>
                <table class="table table-striped table-bordered border border-dark shadow-sm text-center">
                    <tbody>
                        <tr>
                            <td class="col-3">
                                <input class="form-check-input" type="radio" name="Knowledge" value="4">
                                <label class="form-check-label fw-bold">Exceeds expectations</label>
                                <small>Employee Consistently performs at high level that exceeds expectations</small>
                            </td>
                            <td class="col-3">
                                <input class="form-check-input" type="radio" name="Knowledge" value="3">
                                <label class="form-check-label fw-bold">Meets expectations</label>
                                <small>Employee satisfies all essential job requirements; may exceed expectations
                                    periodicallt;
                                    demonstrates likelihood of eventually exceeding expectations</small>
                            </td>
                            <td class="col-3">
                                <input class="form-check-input" type="radio" name="Knowledge" value="2">
                                <label class="form-check-label fw-bold" for="">Needs improvements</label>
                                <small>Employee consistently performs below required standards/expectations for the
                                    position;
                                    training or other action is necessary to correct performance</small>

                            </td>
                            <td class="col-3">
                                <input class="form-check-input" type="radio" name="Knowledge" value="1">
                                <label class="form-check-label fw-bold" for="">Unacceptable</label>
                                <small>Employee is unable or unwilling to perform required duties according to company
                                    standards; immediate improvement must be demonstrated</small>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="container mt-3">
                <div class="row container m-auto">
                    <h5 class="fw-bold">VI. EMPLOYEE COMMENTS(OPTIONAL)</h5>
                </div>
                <div class="container">
                    <div class="mb-3">
                        <label for="exampleTextarea" class="form-label">Comments</label>
                        <textarea class="form-control border border-dark shadow-sm" name="Comments" rows="3" style="resize:none"></textarea>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row container m-auto">
                    <h5 class="fw-bold">VII. ACKNOWLEDGEMENT</h5>
                </div>
                <div class="row container m-auto text-center">
                    <p>I Acknowledge that I have had the opportunity to discuss this performance evaluation with my
                        manager/supervisor and i have received a copy of this evaluation.</p>
                </div>
                <div class="row container m-auto">
                    <div class="col">Employee Signature:</div>
                    <div class="col text-center">Date:</div>
                </div>
                <div class="row container m-auto mt-2">
                    <div class="col">Reviewer Signature:</div>
                    <div class="col text-center">Date:</div>
                </div>
            </div>
        </div>
    </div>
@endsection
