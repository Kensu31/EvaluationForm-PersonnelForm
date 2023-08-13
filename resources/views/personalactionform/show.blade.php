@extends('layouts.app')
@section('title')
    Personnel Action Form
@endsection
@section('content')
    <style>
        small {
            font-size: 12px !important;
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
                                    <input type="text"
                                        class="form-control border shadow-sm @error('employee_number')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        id="employee_number" name="employee_number" onkeypress='return onlyDigits(event)'
                                        value="{{ old('employee_number', $personnelForm->employee_number) }}" required>
                                    @error('employee_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control border border-dark shadow-sm"
                                        id="datePrepared" value="{{ $personnelForm->date_prepared }}" name="date_prepared"
                                        required>
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
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('last_name')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        placeholder="Lastname" id="last_name" name="last_name"
                                        onkeypress='return restrictNumbers(event)'
                                        value="{{ old('last_name', $personnelForm->last_name) }}" required>
                                    @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('first_name')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        placeholder="Firstname" id="first_name" name="first_name"
                                        onkeypress='return restrictNumbers(event)'
                                        value="{{ old('first_name', $personnelForm->first_name) }}" required>
                                    @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control border border-dark shadow-sm"
                                        name="date_hired" value="{{ $personnelForm->date_hired }}">
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
                        <div class="row g-2">
                            <h6 class="col-6 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-6 fw-bold">Effective Date:</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                        value="Performance Review" @if ($personnelForm->positionMovements->reason_for_upgrade === 'Performance Review') checked @endif>
                                    <label class="form-check-label">Performance Review</label>
                                    @error('radioUpgradePosition')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                        value="Promotion" @if ($personnelForm->positionMovements->reason_for_upgrade === 'Promotion') checked @endif>
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDatePosition"
                                        value="Lateral Transfer" @if ($personnelForm->positionMovements->effective_date === 'Lateral Transfer') checked @endif>
                                    <label class="form-check-label">Lateral Transfer</label>
                                    @error('radioEffectiveDatePosition')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDatePosition"
                                        value="Others" @if ($personnelForm->positionMovements->effective_date === 'Others') checked @endif>
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
                                    <input type="text"
                                        class="form-control border shadow-sm @error('job_title_from')
                                    border-danger
                                    @else
                                        border-dark
                                @enderror"
                                        placeholder="From"
                                        value="{{ old('job_title_from', $personnelForm->positionMovements->job_title_from) }}"
                                        onkeypress='return restrictNumbers(event)' name="job_title_from" required>
                                    @error('job_title_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm @error('job_title_from')
                                    border-danger
                                    @else
                                        border-dark
                                @enderror"
                                        placeholder="To"
                                        value="{{ old('job_title_to', $personnelForm->positionMovements->job_title_to) }}"
                                        name="job_title_to" onkeypress='return restrictNumbers(event)' required>
                                    @error('job_title_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('job_level_from')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="job_level_from"
                                        value="{{ old('job_level_from', $personnelForm->positionMovements->job_level_from) }}"
                                        required>
                                    @error('job_level_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('job_level_to')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        placeholder="To" onkeypress='return restrictNumbers(event)' name="job_level_to"
                                        value="{{ old('job_level_to', $personnelForm->positionMovements->job_level_to) }}"
                                        required>
                                    @error('job_level_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('department_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="department_from"
                                        value="{{ old('department_from', $personnelForm->positionMovements->department_from) }}"
                                        required>
                                    @error('department_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('department_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To" onkeypress='return restrictNumbers(event)' name="department_to"
                                        value="{{ old('department_to', $personnelForm->positionMovements->department_to) }}"
                                        required>
                                    @error('department_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('supervisor_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="supervisor_from"
                                        value="{{ old('supervisor_from', $personnelForm->positionMovements->supervisor_from) }}"
                                        required>
                                    @error('supervisor_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('supervisor_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To" onkeypress='return restrictNumbers(event)' name="supervisor_to"
                                        value="{{ old('supervisor_to', $personnelForm->positionMovements->supervisor_to) }}"
                                        required>
                                    @error('supervisor_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-12 fw-bold">Employment Status</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('employment_status_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From" onkeypress='return restrictNumbers(event)'
                                        name="employment_status_from"
                                        value="{{ old('employment_status_from', $personnelForm->positionMovements->employment_status_from) }}"
                                        required>
                                    @error('employment_status_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('employment_status_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To" onkeypress='return restrictNumbers(event)'
                                        name="employment_status_to"
                                        value="{{ old('employment_status_to', $personnelForm->positionMovements->employment_status_to) }}"
                                        required>
                                    @error('employment_status_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                        <div class="row g-2">
                            <h6 class="col-6 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-6 fw-bold">Effective Date:</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Performance Review" @if ($personnelForm->salaryAdjustments->reason_for_upgrade === 'Performance Review') checked @endif>
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Promotion" @if ($personnelForm->salaryAdjustments->reason_for_upgrade === 'Promotion') checked @endif>
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateSalary"
                                        value="Lateral Transfer" @if ($personnelForm->salaryAdjustments->effective_date === 'Lateral Transfer') checked @endif>
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateSalary"
                                        value="Others" @if ($personnelForm->salaryAdjustments->effective_date === 'Others') checked @endif>
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
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('basic_salary_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From ₱ 0"
                                        value="{{ old('basic_salary_from', $personnelForm->salaryAdjustments->basic_salary_from) }}"
                                        onkeypress='return onlyDigits(event)' name="basic_salary_from" required />
                                    @error('basic_salary_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('basic_salary_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To ₱ 0" onkeypress='return onlyDigits(event)' name="basic_salary_to"
                                        value="{{ old('basic_salary_to', $personnelForm->salaryAdjustments->basic_salary_to) }}"
                                        required />
                                    @error('basic_salary_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                        <div class="row g-2">
                            <h6 class="col-6 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-6 fw-bold">Effective Date:</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Performance Review" @if ($personnelForm->benefitAdjustments->reason_for_upgrade === 'Performance Review') checked @endif
                                        required>
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Promotion" @if ($personnelForm->benefitAdjustments->reason_for_upgrade === 'Promotion') checked @endif required>
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateCharges"
                                        value="Lateral Transfer" @if ($personnelForm->benefitAdjustments->effective_date === 'Lateral Transfer') checked @endif
                                        required>
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioEffectiveDateCharges"
                                        value="Others" @if ($personnelForm->benefitAdjustments->effective_date === 'Others') checked @endif required>
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
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('food_allowance_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From ₱ 0" onkeypress='return onlyDigits(event)'
                                        name="food_allowance_from"
                                        value="{{ old('food_allowance_from', $personnelForm->benefitAdjustments->food_allowance_from) }}"
                                        required>
                                    @error('food_allowance_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('food_allowance_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To ₱ 0" onkeypress='return onlyDigits(event)'
                                        name="food_allowance_to"
                                        value="{{ old('food_allowance_to', $personnelForm->benefitAdjustments->food_allowance_to) }}"
                                        required>
                                    @error('food_allowance_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('vacation_leave_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From ₱ 0" onkeypress='return onlyDigits(event)'
                                        value="{{ old('vacation_leave_from', $personnelForm->benefitAdjustments->vacation_leave_from) }}"
                                        name="vacation_leave_from" required>
                                    @error('vacation_leave_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('vacation_leave_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To ₱ 0" onkeypress='return onlyDigits(event)'
                                        name="vacation_leave_to"
                                        value="{{ old('vacation_leave_to', $personnelForm->benefitAdjustments->vacation_leave_to) }}"
                                        required>
                                    @error('vacation_leave_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('sick_leave_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From ₱ 0" onkeypress='return onlyDigits(event)'
                                        name="sick_leave_from"
                                        value="{{ old('sick_leave_from', $personnelForm->benefitAdjustments->sick_leave_from) }}"
                                        required>
                                    @error('sick_leave_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('sick_leave_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To ₱ 0" onkeypress='return onlyDigits(event)' name="sick_leave_to"
                                        value="{{ old('sick_leave_to', $personnelForm->benefitAdjustments->sick_leave_to) }}"
                                        required>
                                    @error('sick_leave_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('birthday_leave_from')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="From ₱ 0" onkeypress='return onlyDigits(event)'
                                        name="birthday_leave_from"
                                        value="{{ old('birthday_leave_from', $personnelForm->benefitAdjustments->birthday_leave_from) }}"
                                        required>
                                    @error('birthday_leave_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('birthday_leave_to')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        placeholder="To ₱ 0 " onkeypress='return onlyDigits(event)'
                                        name="birthday_leave_to"
                                        value="{{ old('birthday_leave_to', $personnelForm->benefitAdjustments->birthday_leave_to) }}"
                                        required>
                                    @error('birthday_leave_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                                <textarea
                                    class="form-control border shadow-sm  @error('remarkable_performance')
                                border-danger
                                @else
                                border-dark
                            @enderror"
                                    name="remarkable_performance" cols="10" rows="5" style="resize: none">{{ old('remarkable_performance', $personnelForm->generalRemarks->remarkable_performance) }}</textarea>
                                @error('remarkable_performance')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mt-4">
                                <h6 class="fw-bold text-center">Rooms for improvements:</h6>
                                <textarea
                                    class="form-control border shadow-sm  @error('rooms_for_improvements')
                                border-danger
                                @else
                                border-dark
                            @enderror"
                                    name="rooms_for_improvements" cols="10" rows="5" style="resize: none" required>{{ old('rooms_for_improvements', $personnelForm->generalRemarks->rooms_for_improvements) }}</textarea>
                                @error('rooms_for_improvements')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('manager_name')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        name="manager_name" onkeypress='return restrictNumbers(event)'
                                        value="{{ old('manager_name', $personnelForm->approvals->manager_name) }}"
                                        required>
                                    @error('manager_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control border shadow-sm  @error('received')
                                    border-danger
                                    @else
                                    border-dark
                                @enderror"
                                        name="received" onkeypress='return restrictNumbers(event)'
                                        value="{{ old('received', $personnelForm->approvals->received) }}" required>
                                    @error('received')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control border border-dark shadow-sm"
                                        name="approval_date" value="{{ $personnelForm->approvals->approval_date }}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-end">
                                <button type="" class="btn btn-success" id="btnupdate">
                                    <i class="fas fa-save px-2"></i> Update
                                </button>
                                <button type="" class="btn btn-danger" id="cancel">
                                    <i class="fas fa-times px-2"></i> Cancel
                                </button>
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
                        document.getElementById('cancel').addEventListener('click', function(event) {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'You are about to cancel editing this form.',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/view-forms';
                                }
                            });


                        });
                    </script>

                </div>
            </div>
        </div>

        {{-- Script --}}
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
        {{-- Script --}}
    @endsection
