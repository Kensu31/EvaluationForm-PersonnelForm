@extends('layouts.app')
@section('title')
    Evaluation Form
@endsection
@section('content')
    <style>
        small {
            font-size: 12px;
        }
    </style>
    <div class="container">
        <div class="card m-auto mt-5 mb-5 border shadow p-3 rounded rounded-4" style="width:90%">
            <div class="card-tit">
                <h1 class="m-3 fst-italic">Employee Evaluation Form</h1>
            </div>
            <div class="card-body">

                <form action="/submit-evaluation-form" method="POST" class="row g-3 pb-4">
                    @csrf
                    <div class="col-md-10">
                        <h4 class="fw-bold">I. EMPLOYEE INFORMATION</h4>
                    </div>
                    <div class="row px-5 py-2">
                        <div class="col-md-3">
                            <label for="employee_name" class="form-label">Employee name:</label>
                            <input type="text"
                                class="form-control border shadow-sm @error('employee_name')
                                border-danger
                            @else
                            border-dark
                            @enderror"
                                name="employee_name" value="{{ old('employee_name') }}" />
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
                                name="job_title" value="{{ old('job_title') }}">
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
                                name="reviewer" value="{{ old('reviewer') }}">
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
                                name="review_period" value="{{ old('review_period') }}">
                            @error('review_period')
                                <small class="text-danger">{{ $message }}</small>
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
                                    <th class="col-md-4 text-center p-3">PERFORMANCE CATEGORY</th>
                                    <th class="col-md-8 text-center p-3" colspan="4">RATING</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="form-group">
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Quality of
                                                Work:</span><br>Work is completed accurately(few or no errors), efficiently
                                            and within deadlines with minimal supervision</p>
                                        @error('Quality_Work')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Quality_Work"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Quality_Work"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Quality_Work"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Quality_Work"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Attendance &
                                                Punctuality:</span><br>Reports for work on time, provides advance notice of
                                            need for absence</p>
                                        @error('Attendance_Punctuality')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span
                                                class="fw-bold fs-5">Reliability/Dependability:</span><br>Consistently
                                            performs at a high level; manages time and workload effectively to meet
                                            responsibilities</p>
                                        @error('Reliability')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Reliability"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Reliability"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Reliability"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Reliability"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Communication
                                                Skills:</span><br>Written and oral communnications are clear, organized and
                                            effective; listens and comprehends well</p>
                                        @error('Communication')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Communication"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Communication"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Communication"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Communication"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Judgment &
                                                Decision-making:</span><br>Makes thoughtful, well-reasoned decisions;
                                            exercises good judgment, resourcefulness and creativity in problem-solving</p>
                                        @error('Judgment')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Judgment"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Judgment"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Judgment"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Judgment"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Initiative &
                                                flexibility:</span><br>Demonstrates initiative, often seeking out additional
                                            responsibility; identifies problems and solutions; thrives on new challenges and
                                            adjust to unexpected changes</p>
                                        @error('Initiative')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Initiative"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Initiative"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Initiative"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Initiative"
                                                value="1">
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
                                    <th class="col-md-4 text-center p-3">PERFORMANCE CATEGORY</th>
                                    <th class="col-md-8 text-center p-3" colspan="4">RATING</th>
                                </tr>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Knowledge of
                                                Position:</span><br>Possessees required skills, knowledge, and abilities to
                                            compentently perform the job</p>
                                        @error('Knowledge')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Knowledge"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Knowledge"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Knowledge"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Knowledge"
                                                value="1">
                                            <label class="form-check-label" for="">Unacceptable</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-md-5 ">
                                        <p class="p-3 fst-italic fs-7"><span class="fw-bold fs-5">Training &
                                                Development:</span><br>Continually seeks ways to strengthen performance and
                                            regularly monitors new developments in field of work</p>
                                        @error('Training')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Training"
                                                value="4">
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Training"
                                                value="3">
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Training"
                                                value="2">
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Training"
                                                value="1">
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
                                <label for="exampleTextarea" class="form-label">Set objectives and outline steps to
                                    improve in problem areas or further employee developement.</label>
                                <textarea
                                    class="form-control border shadow-sm @error('Performance')
                                border-danger
                                @else
                                border-dark
                                @enderror"
                                    name="Performance" placeholder="Enter text here" rows="5" style="resize: none"></textarea>
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
                                <label for="exampleTextarea" class="form-label">Comment</label>
                                <textarea class="form-control border border-dark shadow-sm" name="Comments" placeholder="Enter comment here"
                                    rows="5" style="resize:none"></textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success fs-6 px-4 py-2  mt-2 shadow"
                                id="btnsubmitevaluation"> <i class="fas fa-file px-2"></i> Save
                                evaluation</button>
                            <button type="" class="btn btn-danger fs-6 px-4 py-2  mt-2 shadow" id="btncancel"> <i
                                    class="fas fa-times px-2"></i> Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('btnsubmitevaluation').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to create this form.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, create it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = this.closest('form');
                    if (form) {
                        form.submit();
                    }
                }
            });
        });
        document.getElementById('btncancel').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to cancel creating this form.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/';
                }
            });

        });
    </script>
@endsection
