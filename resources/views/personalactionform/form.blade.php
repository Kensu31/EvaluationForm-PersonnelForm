@extends('layouts.app')
@section('title')
    Personnel Action Form
@endsection
@section('content')
    <div class="container mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success">

                {{ session()->get('success') }}

            </div>
        @endif
        <div class="container mt-5 mb-5">
            <div class="card m-auto border shadow p-3 rounded rounded-4" id="PersonnelActionNoticeForm" style="width: 85%">
                <div class="card-title mt-2 border-bottom text-center">
                    <h2 class="px-5 py-2">PERSONNEL ACTION NOTICE</h2>
                </div>
                <div class="card-body px-5 mt-4">
                    <form action="/submit_store_form" method="POST">
                        @csrf
                        <div class="row g-2">
                            <h6 class="col-8">Employee Number</h6>
                            <h6 class="col-4">Date Prepared</h6>
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="row g-2">
                                <div class="col-8">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        id="employee_number" name="employee_number" onkeypress='return onlyDigits(event)'
                                        required>
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control border border-dark shadow-sm"
                                        id="datePrepared" name="date_prepared">
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <h6 class="col-8">Employee Name</h6>
                            <h6 class="col-4">Date Hired</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-4">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="Lastname" id="last_name" name="last_name"
                                        onkeypress='return restrictNumbers(event)' required>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="Firstname" id="first_name" name="first_name"
                                        onkeypress='return restrictNumbers(event)' required>
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control border border-dark shadow-sm"
                                        name="date_hired">
                                </div>
                            </div>
                        </div>

                        {{-- Position Section  --}}

                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">POSITION UPGRADE AND MOVEMENT</h4>
                            </div>
                        </div>
                        <div class="row g-2">
                            <h6 class="col-6 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-6 fw-bold">Effective Date:</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                        value="Performance Review">
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                        value="Promotion">
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDatePosition"
                                        value="Lateral Transfer">
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDatePosition"
                                        value="Others">
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3">
                            <h6 class="col-2 fw-bold">Result:</h6>
                            <h6 class="col-10 fw-bold">REGULARIZATION</h6>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-6 fw-bold">Job Title</h6>
                            <h6 class="col-6 fw-bold">Job Level</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return restrictNumbers(event)' name="job_title_from"
                                        required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm" placeholder="To"
                                        name="job_title_to" onkeypress='return restrictNumbers(event)' required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="job_level_from" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return restrictNumbers(event)' name="job_level_to"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-6 fw-bold">Department</h6>
                            <h6 class="col-6 fw-bold">Supervisor</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="department_from" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return restrictNumbers(event)' name="department_to"
                                        required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="supervisor_from" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return restrictNumbers(event)' name="supervisor_to"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-12 fw-bold">Employment Status</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="employment_status_from" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return restrictNumbers(event)'
                                        name="employment_status_to" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">SALARY ADJUSTMENT</h4>
                            </div>
                        </div>
                        <div class="row g-2">
                            <h6 class="col-6 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-6 fw-bold">Effective Date:</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Performance Review">
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Promotion">
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateSalary"
                                        value="Lateral Transfer">
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateSalary"
                                        value="Others">
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-12 fw-bold">Basic Salary</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return onlyDigits(event)' name="basic_salary_from"
                                        required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return onlyDigits(event)' name="basic_salary_to"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">ADDITIONAL / CHANGES IN BENEFITS</h4>
                            </div>
                        </div>
                        <div class="row g-2">
                            <h6 class="col-6 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-6 fw-bold">Effective Date:</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Performance Review">
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Promotion">
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateCharges"
                                        value="Lateral Transfer">
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateCharges"
                                        value="Others">
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-6 fw-bold">Food Allowance</h6>
                            <h6 class="col-6 fw-bold">Vacation Leave</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return onlyDigits(event)'
                                        name="food_allowance_from" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return onlyDigits(event)' name="food_allowance_to"
                                        required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return onlyDigits(event)'
                                        name="vacation_leave_from" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return onlyDigits(event)' name="vacation_leave_to"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-6 fw-bold">Sick Leave</h6>
                            <h6 class="col-6 fw-bold">Birthday Leave</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return onlyDigits(event)' name="sick_leave_from"
                                        required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return onlyDigits(event)' name="sick_leave_to"
                                        required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="From" onkeypress='return onlyDigits(event)'
                                        name="birthday_leave_from" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        placeholder="To" onkeypress='return onlyDigits(event)' name="birthday_leave_to"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">GENERAL REMARKS</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <h6 class="fw-bold text-center">Remarkable Performance:</h6>
                                <textarea class="form-control border border-dark shadow-sm" name="remarkable_performance" cols="10"
                                    rows="5"></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <h6 class="fw-bold text-center">Rooms for improvements:</h6>
                                <textarea class="form-control border border-dark shadow-sm" name="rooms_for_improvements" cols="10"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">APPROVAL</h4>
                            </div>
                        </div>
                        <div class="row g-2">
                            <h6 class="col-6 fw-bold">Manager:</h6>
                            <h6 class="col-3 fw-bold">Received:</h6>
                            <h6 class="col-3 fw-bold">Date:</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        name="manager_name" onkeypress='return restrictNumbers(event)' required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border border-dark shadow-sm"
                                        name="received" onkeypress='return restrictNumbers(event)' required>
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control border border-dark shadow-sm"
                                        name="approval_date">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-end">
                                {{-- <button class="btn btn-success" id="print">
                                <i class="fas fa-print px-2"></i>Print
                              </button> --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save px-2"></i> Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <script>
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
