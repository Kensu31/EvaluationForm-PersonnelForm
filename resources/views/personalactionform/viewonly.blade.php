@extends('layouts.app')
@section('title')
    Personnel Action Form
@endsection
@section('content')
    <style>
        small {
            font-size: 12px !important;
        }


        .underline-input:focus {
            border-color: #ccc;
            box-shadow: none;
        }

        input[type='radio'] {
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
    <div class="container mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success">

                {{ session()->get('success') }}

            </div>
        @endif
        <div class="container mt-5 mb-5">
            <div class="card m-auto border shadow p-3 rounded rounded-4" id="PersonnelActionNoticeForm" style="width: 85%;">
                <div class="card-title mt-2 border-bottom text-center">
                    <h2 class="px-5 py-2">PERSONNEL ACTION NOTICE</h2>
                </div>
                {{-- employee details --}}
                <div class="card-body px-5 mt-4">
                    <form action="/update-form/{{ $personnelForm->id }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <h6 class="col-8">Employee Number</h6>
                            <h6 class="col-4">Date Prepared</h6>
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="row g-2">
                                <div class="col-8">
                                    <input type="text" class="form-control underline-input px-2" id="employee_number"
                                        name="employee_number" onkeypress='return onlyDigits(event)'
                                        value="{{ old('employee_number', $personnelForm->employee->id) }}" readonly>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control underline-input px-2 " id="datePrepared"
                                        value="{{ $personnelForm->date_prepared }}" name="date_prepared" readonly>
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
                                    <input type="text" class="form-control underline-input px-2" placeholder="Lastname"
                                        id="last_name" name="last_name"
                                        value="{{ old('last_name', $personnelForm->employee->last_name) }}" readonly>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control underline-input px-2" placeholder="Firstname"
                                        id="first_name" name="first_name"
                                        value="{{ old('first_name', $personnelForm->employee->first_name) }}" readonly>
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control underline-input px-2 " name="date_hired"
                                        value="{{ $personnelForm->employee->date_hired }}" readonly>
                                </div>
                            </div>
                        </div>
                        {{-- employee details --}}
                        {{-- Position Section  --}}

                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">POSITION UPGRADE AND MOVEMENT</h4>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <div class="row g-2 align-items-baseline">
                                <h6 class="col-5 fw-bold">Reason for upgrade:</h6>
                                <h6 class="col-3 fw-bold text-end">Effective Date:</h6>
                                <div class="col-4">
                                    <input type="text" class="form-control underline-input px-2"
                                        name="radioEffectiveDatePosition" id="radioEffectiveDatePosition"
                                        value="{{ old('radioEffectiveDatePosition', $personnelForm->positionMovements->effective_date) }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="row g-2">
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Performance Review"
                                            {{ $personnelForm->positionMovements->reason_for_upgrade == 'Performance Review' ? 'checked' : '' }}>
                                        <label class="form-check-label">Performance Review</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Promotion"
                                            {{ $personnelForm->positionMovements->reason_for_upgrade == 'Promotion' ? 'checked' : '' }}>
                                        <label class="form-check-label">Promotion</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Lateral Transfer"
                                            {{ $personnelForm->positionMovements->reason_for_upgrade == 'Lateral Transfer' ? 'checked' : '' }}>
                                        <label class="form-check-label">Lateral Transfer</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Others"
                                            {{ explode(' ', $personnelForm->positionMovements->reason_for_upgrade)[0] == 'Others' ? 'checked' : '' }}>
                                        <label class="form-check-label">Others</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group other-input mt-2" id="otherUpgradePosition" style="display: none;">
                                <input type="text" class="form-control underline-input" name="otherUpgradePosition"
                                    placeholder="Other Reason"
                                    value="{{ explode(' ', $personnelForm->positionMovements->reason_for_upgrade)[0] == 'Others' ? explode(' ', $personnelForm->positionMovements->reason_for_upgrade)[1] : '' }}"
                                    readonly />
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
                                    <input type="text" class="form-control underline-input px-2" placeholder="From"
                                        value="{{ old('job_title_from', $personnelForm->positionMovements->job_title_from) }}"
                                        name="job_title_from" readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To"
                                        value="{{ old('job_title_to', $personnelForm->positionMovements->job_title_to) }}"
                                        name="job_title_to" readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="From"
                                        name="job_level_from"
                                        value="{{ old('job_level_from', $personnelForm->positionMovements->job_level_from) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To"
                                        name="job_level_to"
                                        value="{{ old('job_level_to', $personnelForm->positionMovements->job_level_to) }}"
                                        readonly>
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
                                    <input type="text" class="form-control underline-input px-2" placeholder="From"
                                        name="department_from"
                                        value="{{ old('department_from', $personnelForm->positionMovements->department_from) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To"
                                        name="department_to"
                                        value="{{ old('department_to', $personnelForm->positionMovements->department_to) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="From"
                                        name="supervisor_from"
                                        value="{{ old('supervisor_from', $personnelForm->positionMovements->supervisor_from) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To"
                                        name="supervisor_to"
                                        value="{{ old('supervisor_to', $personnelForm->positionMovements->supervisor_to) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-12 fw-bold">Employment Status</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" class="form-control underline-input px-2" placeholder="From"
                                        name="employment_status_from"
                                        value="{{ old('employment_status_from', $personnelForm->positionMovements->employment_status_from) }}"
                                        readonly>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To"
                                        name="employment_status_to"
                                        value="{{ old('employment_status_to', $personnelForm->positionMovements->employment_status_to) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        {{-- Position Section  --}}
                        {{-- Salary Section  --}}
                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">SALARY ADJUSTMENT</h4>
                            </div>
                        </div>
                        <div class="row g-2 align-items-baseline">
                            <h6 class="col-5 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-3 fw-bold text-end">Effective Date:</h6>
                            <div class="col-4">
                                <input type="text" class="form-control underline-input px-2"
                                    name="radioEffectiveDateSalary" id="radioEffectiveDateSalary"
                                    value="{{ old('radioEffectiveDateSalary', $personnelForm->salaryAdjustments->effective_date) }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Performance Review"
                                        {{ $personnelForm->salaryAdjustments->reason_for_upgrade == 'Performance Review' ? 'checked' : '' }}>
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Promotion"
                                        {{ $personnelForm->salaryAdjustments->reason_for_upgrade == 'Promotion' ? 'checked' : '' }}>
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Lateral Transfer"
                                        {{ $personnelForm->salaryAdjustments->reason_for_upgrade == 'Lateral Transfer' ? 'checked' : '' }}>
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Others"
                                        {{ explode(' ', $personnelForm->salaryAdjustments->reason_for_upgrade)[0] == 'Others' ? 'checked' : '' }}>
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group other-input mt-2" id="otherUpgradeSalary" style="display: none;">
                            <input type="text" class="form-control underline-input" name="otherUpgradeSalary"
                                placeholder="Other Reason"
                                value="{{ explode(' ', $personnelForm->salaryAdjustments->reason_for_upgrade)[0] == 'Others' ? explode(' ', $personnelForm->salaryAdjustments->reason_for_upgrade)[1] : '' }}"
                                readonly>
                        </div>
                        <div class="row">
                            @error('radioUpgradeSalary')
                                <small class="col-6 text-danger">{{ $message }}</small>
                            @enderror
                            @error('radioEffectiveDateSalary')
                                <small class="col-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-12 fw-bold">Basic Salary</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" class="form-control underline-input px-2"
                                        placeholder="From ₱ 0"
                                        value="{{ old('basic_salary_from', $personnelForm->salaryAdjustments->basic_salary_from) }}"
                                        name="basic_salary_from" readonly />
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To ₱ 0"
                                        name="basic_salary_to"
                                        value="{{ old('basic_salary_to', $personnelForm->salaryAdjustments->basic_salary_to) }}"
                                        readonly />
                                </div>
                            </div>
                        </div>
                        {{-- Salary Section  --}}
                        {{-- Benefits Section  --}}
                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">ADDITIONAL / CHANGES IN BENEFITS</h4>
                            </div>
                        </div>
                        <div class="row g-2 align-items-baseline">
                            <h6 class="col-5 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-3 fw-bold text-end">Effective Date:</h6>
                            <div class="col-4">
                                <input type="text" class="form-control underline-input px-2"
                                    name="radioEffectiveDateCharges" id="radioEffectiveDateCharges"
                                    value="{{ old('radioEffectiveDateCharges', $personnelForm->benefitAdjustments->effective_date) }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Performance Review"
                                        {{ $personnelForm->benefitAdjustments->reason_for_upgrade == 'Performance Review' ? 'checked' : '' }}>
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Promotion"
                                        {{ $personnelForm->benefitAdjustments->reason_for_upgrade == 'Promotion' ? 'checked' : '' }}>
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Lateral Transfer"
                                        {{ $personnelForm->benefitAdjustments->reason_for_upgrade == 'Lateral Transfer' ? 'checked' : '' }}>
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Others"
                                        {{ explode(' ', $personnelForm->benefitAdjustments->reason_for_upgrade)[0] == 'Others' ? 'checked' : '' }}>
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group other-input mt-2" id="otherUpgradeCharges" style="display:none;">
                            <input type="text" class="form-control underline-input" name="otherUpgradeCharges"
                                placeholder="Other Reason"
                                value="{{ explode(' ', $personnelForm->benefitAdjustments->reason_for_upgrade)[0] == 'Others' ? explode(' ', $personnelForm->benefitAdjustments->reason_for_upgrade)[1] : '' }}"
                                readonly>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-6 fw-bold">Food Allowance</h6>
                            <h6 class="col-6 fw-bold">Vacation Leave</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2"
                                        placeholder="From ₱ 0" name="food_allowance_from"
                                        value="{{ old('food_allowance_from', $personnelForm->benefitAdjustments->food_allowance_from) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To ₱ 0"
                                        name="food_allowance_to"
                                        value="{{ old('food_allowance_to', $personnelForm->benefitAdjustments->food_allowance_to) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2"
                                        placeholder="From ₱ 0"
                                        value="{{ old('vacation_leave_from', $personnelForm->benefitAdjustments->vacation_leave_from) }}"
                                        name="vacation_leave_from" readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To ₱ 0"
                                        name="vacation_leave_to"
                                        value="{{ old('vacation_leave_to', $personnelForm->benefitAdjustments->vacation_leave_to) }}"
                                        readonly>
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
                                    <input type="text" class="form-control underline-input px-2"
                                        placeholder="From ₱ 0" name="sick_leave_from"
                                        value="{{ old('sick_leave_from', $personnelForm->benefitAdjustments->sick_leave_from) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2   "
                                        placeholder="To ₱ 0" name="sick_leave_to"
                                        value="{{ old('sick_leave_to', $personnelForm->benefitAdjustments->sick_leave_to) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2 "
                                        placeholder="From ₱ 0" name="birthday_leave_from"
                                        value="{{ old('birthday_leave_from', $personnelForm->benefitAdjustments->birthday_leave_from) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" placeholder="To ₱ 0 "
                                        name="birthday_leave_to"
                                        value="{{ old('birthday_leave_to', $personnelForm->benefitAdjustments->birthday_leave_to) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        {{-- Benefits Section  --}}

                        {{-- Remarks Section  --}}
                        <div class="row mt-4">
                            <div class="col">
                                <h4 class="bg-light py-3 px-2 rounded">GENERAL REMARKS</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <h6 class="fw-bold text-center">Remarkable Performance:</h6>
                                <textarea class="form-control border" name="remarkable_performance" cols="10" rows="5"
                                    style="resize: none" readonly>{{ old('remarkable_performance', $personnelForm->generalRemarks->remarkable_performance) }}</textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <h6 class="fw-bold text-center">Rooms for improvements:</h6>
                                <textarea class="form-control border" name="rooms_for_improvements" cols="10" rows="5"
                                    style="resize: none" readonly>{{ old('rooms_for_improvements', $personnelForm->generalRemarks->rooms_for_improvements) }}</textarea>
                            </div>
                        </div>
                        {{-- Remarks Section  --}}

                        {{-- Approval Section  --}}
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
                                    <input type="text" class="form-control underline-input px-2" name="manager_name"
                                        value="{{ old('manager_name', $personnelForm->approvals->manager_name) }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2" name="received"
                                        value="{{ old('received', $personnelForm->approvals->received) }}" readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control underline-input px-2 " name="approval_date"
                                        value="{{ $personnelForm->approvals->approval_date }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-end">
                                <a href='/view-forms' class="btn btn-primary" id="cancel">
                                    <i class="fas fa-door-open px-2"></i> Back
                                </a>
                            </div>

                        </div>
                        {{-- Approval Section  --}}
                    </form>

                    <script>
                        document.getElementById('btnupdate').addEventListener('click', function(event) {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'You are about to update this form.',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, update it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const form = this.closest('form');
                                    if (form) {
                                        form.submit();
                                    }
                                }
                            });
                        });
                    </script>

                </div>
            </div>
        </div>

        {{-- Script --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const radioUpgradePosition = document.querySelectorAll('input[name="radioUpgradePosition"]');
                const radioUpgradeCharges = document.querySelectorAll('input[name="radioUpgradeCharges"]');
                const radioUpgradeSalary = document.querySelectorAll('input[name="radioUpgradeSalary"]');

                const otherUpgradePosition = document.getElementById("otherUpgradePosition");
                const otherUpgradeSalary = document.getElementById("otherUpgradeSalary");
                const otherUpgradeCharges = document.getElementById("otherUpgradeCharges");
                const fieldUpgradePosition = document.getElementsByName("otherUpgradePosition")[0];
                const fieldUpgradeSalary = document.getElementsByName("otherUpgradeSalary")[0];
                const fieldUpgradeCharges = document.getElementsByName("otherUpgradeCharges")[0];


                function toggleOtherInput() {
                    if (radioUpgradePosition[3].checked) {
                        otherUpgradePosition.style.display = "block";
                    } else {
                        otherUpgradePosition.style.display = "none";
                    }
                }

                function toggleOtherInputSalary() {
                    if (radioUpgradeSalary[3].checked) {
                        otherUpgradeSalary.style.display = "block";

                    } else {
                        otherUpgradeSalary.style.display = "none";
                    }
                }

                function toggleOtherInputCharges() {
                    if (radioUpgradeCharges[3].checked) {
                        otherUpgradeCharges.style.display = "block";

                    } else {
                        otherUpgradeCharges.style.display = "none";
                    }
                }

                radioUpgradePosition.forEach(function(radio) {
                    radio.addEventListener("change", toggleOtherInput);
                });
                radioUpgradeSalary.forEach(function(radio) {
                    radio.addEventListener("change", toggleOtherInputSalary);
                });
                radioUpgradeCharges.forEach(function(radio) {
                    radio.addEventListener("change", toggleOtherInputCharges);
                });

                toggleOtherInput();
                toggleOtherInputSalary();
                toggleOtherInputCharges();
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
        {{-- Script --}}
    @endsection
