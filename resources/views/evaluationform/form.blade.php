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

        input {
            font-size: 13px !important;
        }

        table {
            font-size: 13px !important;
        }

        .underline-input {
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0;
            /* Optional: Remove any border-radius to make it fully flat */
            padding: 5px 0;
            /* Optional: Add some padding for visual separation */
        }

        .underline-input:focus {
            border-color: #ccc;
            box-shadow: none;
            background-color: #f0f0f0;
            transition: background-color 0.2s ease-in-out;
        }
    </style>
    <div class="container">
        <div class="card m-auto mt-5 mb-5 border shadow p-3 rounded rounded-4" style="width:90%">
            <div class="card-tite border-bottom text-center">
                <h1 class="m-3 fw-bold">Employee Evaluation Form</h1>
            </div>
            <div class="card-body">

                <form action="/submit-evaluation-form" method="POST" class="row g-3 pb-4">
                    @csrf
                    <div class="col-md-10 mt-5">
                        <h5 class="fw-bold">I. EMPLOYEE INFORMATION</h5>
                    </div>
                    <div class="row px-5 py-2">
                        <div class="col-md-6 d-flex align-items-center">
                            <label for="employee_name" class="form-label me-3 mb-0 align-middle">Employee name:</label>
                            <div class="flex-grow-1">
                                <input type="text"
                                    class="form-control underline-input px-2 @error('employee_name') border-danger @else border-dark @enderror"
                                    name="employee_name"
                                    value="{{ $employeeInfo->last_name }} {{ $employeeInfo->first_name }}"
                                    onkeypress="return restrictNumbers(event)" readonly />
                                @error('employee_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label for="job_title" class="form-label me-3 mb-0 align-middle">Job Title:</label>
                            <div class="flex-grow-1">
                                <input type="text"
                                    class="form-control underline-input px-2 @error('job_title') border-danger @else border-dark @enderror"
                                    name="job_title" value="{{ $employeeInfo->position }}"
                                    onkeypress="return restrictNumbers(event)" readonly />
                                @error('job_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row px-5 py-2">
                        <div class="col-md-6 d-flex align-items-center">
                            <label for="reviewer" class="form-label me-3 mb-0 align-middle">Supervisor/Reviewer:</label>
                            <div class="flex-grow-1">
                                <input type="text"
                                    class="form-control underline-input px-2 @error('reviewer')
                                        border-danger
                                    @else
                                    border-dark
                                    @enderror"
                                    name="reviewer" value="{{ old('reviewer') }}"
                                    onkeypress="return(restrictNumbers(event))" />
                                @error('reviewer')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label for="inputAddress" class="form-label me-3 mb-0 align-middle">Review Period:</label>
                            <div class="flex-grow-1">
                                <input type="date"
                                    class="form-control underline-input px-2  @error('review_period')
                                        border-danger
                                    @else
                                    border-dark
                                    @enderror"
                                    name="review_period" value="{{ old('review_period') }}">
                                @error('review_period')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>





                    <div class="col-md-10 mt-5">
                        <h4 class="fw-bold">II. CORE VALUES AND OBJECTIVES</h4>
                    </div>

                    <div class="table-responsive px-5">
                        <table class="table table-striped border border-dark ">
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
                                                value="4" {{ old('Quality_Work') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Quality_Work"
                                                value="3" {{ old('Quality_Work') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Quality_Work"
                                                value="2" {{ old('Quality_Work') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Quality_Work"
                                                value="1" {{ old('Quality_Work') == '1' ? 'checked' : '' }}>
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
                                                value="4"
                                                {{ old('Attendance_Punctuality') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                                value="3"
                                                {{ old('Attendance_Punctuality') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                                value="2"
                                                {{ old('Attendance_Punctuality') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Attendance_Punctuality"
                                                value="1"
                                                {{ old('Attendance_Punctuality') == '1' ? 'checked' : '' }}>
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
                                                value="4" {{ old('Reliability') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Reliability"
                                                value="3" {{ old('Reliability') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Reliability"
                                                value="2" {{ old('Reliability') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Reliability"
                                                value="1" {{ old('Reliability') == '1' ? 'checked' : '' }}>
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
                                                value="4" {{ old('Communication') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Communication"
                                                value="3" {{ old('Communication') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Communication"
                                                value="2" {{ old('Communication') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Communication"
                                                value="1" {{ old('Communication') == '1' ? 'checked' : '' }}>
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
                                                value="4" {{ old('Judgment') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Judgment"
                                                value="3" {{ old('Judgment') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Judgment"
                                                value="2" {{ old('Judgment') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Judgment"
                                                value="1" {{ old('Judgment') == '1' ? 'checked' : '' }}>
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
                                                value="4" {{ old('Initiative') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Initiative"
                                                value="3" {{ old('Initiative') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Initiative"
                                                value="2" {{ old('Initiative') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Initiative"
                                                value="1" {{ old('Initiative') == '1' ? 'checked' : '' }}>
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
                                                value="4" {{ old('Knowledge') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Knowledge"
                                                value="3" {{ old('Knowledge') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Knowledge"
                                                value="2" {{ old('Knowledge') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Knowledge"
                                                value="1" {{ old('Knowledge') == '1' ? 'checked' : '' }}>
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
                                                value="4" {{ old('Training') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label">Exceeds expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Training"
                                                value="3" {{ old('Training') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label">Meets expectations</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Training"
                                                value="2" {{ old('Training') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="">Needs improvements</label>
                                        </div>
                                    </td>
                                    <td class="col-md-2 text-center align-middle">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Training"
                                                value="1" {{ old('Training') == '1' ? 'checked' : '' }}>
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
                                    name="Performance" placeholder="Enter text here" rows="5" style="resize: none">{{ old('Performance') }}</textarea>
                                @error('Performance')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="employee_id" value="{{ $employeeInfo->id }}" />
                    <div class="container mt-3">
                        <h4 class="fw-bold">VI. EMPLOYEE COMMENTS(OPTIONAL)</h4>
                        <div class="container">
                            <div class="mb-3">
                                <label for="exampleTextarea" class="form-label">Comments</label>
                                <textarea class="form-control border border-dark shadow-sm" name="Comments" placeholder="Enter comment here"
                                    rows="5" style="resize:none">{{ old('Comments') }}</textarea>
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
                    window.location.href = '/view-evaluation-form';
                }
            });

        });

        function onlyDigits(event) {
            const charCode = event.charCode || event.keyCode;
            if ((charCode < 48 || charCode > 57) && charCode !== 8 && charCode !== 46) {
                return false;
            }
        }

        function restrictNumbers(event) {
            const charCode = event.which || event.keyCode;
            if (charCode >= 48 && charCode <= 57) {
                return false;
            }
        }
    </script>
@endsection
