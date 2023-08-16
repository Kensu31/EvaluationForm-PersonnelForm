@extends('layouts.app')
@section('title')
    Personnel Action Form
@endsection
@section('content')
    <style>
        small {
            font-size: 12px !important;
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
                                        class="form-control underline-input px-2  @error('employee_number')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        id="employee_number" name="employee_number" onkeypress='return onlyDigits(event)'
                                        value="{{ old('employee_number', $personnelForm->employee->id) }}" required
                                        readonly>
                                    @error('employee_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control underline-input px-2 border-dark "
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
                                        class="form-control underline-input px-2   @error('last_name')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        placeholder="Lastname" id="last_name" name="last_name"
                                        onkeypress='return restrictNumbers(event)'
                                        value="{{ old('last_name', $personnelForm->employee->last_name) }}" required
                                        readonly>
                                    @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <input type="text"
                                        class="form-control underline-input px-2   @error('first_name')
                                        border-danger
                                        @else
                                        border-dark
                                    @enderror"
                                        placeholder="Firstname" id="first_name" name="first_name"
                                        onkeypress='return restrictNumbers(event)'
                                        value="{{ old('first_name', $personnelForm->employee->first_name) }}" required
                                        readonly>
                                    @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control underline-input px-2 border-dark "
                                        name="date_hired" value="{{ $personnelForm->employee->date_hired }}" readonly>
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
                                    <input type="date" class="form-control underline-input px-2"
                                        name="radioEffectiveDatePosition" id="radioEffectiveDatePosition"
                                        value="{{ old('radioEffectiveDatePosition', $personnelForm->positionMovements->effective_date) }}">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="row g-2">
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Performance Review"
                                            {{ old('radioUpgradePosition') == 'Performance Review' ? 'checked' : '' }}>
                                        <label class="form-check-label">Performance Review</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Promotion"
                                            {{ old('radioUpgradePosition') == 'Promotion' ? 'checked' : '' }}>
                                        <label class="form-check-label">Promotion</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Lateral Transfer"
                                            {{ old('radioUpgradePosition') == 'Lateral Transfer' ? 'checked' : '' }}>
                                        <label class="form-check-label">Lateral Transfer</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-check-input" type="radio" name="radioUpgradePosition"
                                            value="Others"
                                            {{ Str::startsWith($personnelForm->positionMovements->radioUpgradePosition ?? '', 'Others') ? 'checked' : '' }}>
                                        <label class="form-check-label">Others</label>
                                    </div>
                                </div>
                            </div>
                            <p>s{{ Str::startsWith($personnelForm->positionMovements->radioUpgradePosition) }}</p>
                            <div class="form-group other-input mt-2" id="otherUpgradePosition" style="display: none;">
                                <input type="text" class="form-control" name="otherUpgradePosition"
                                    placeholder="Other Reason">
                            </div>
                        </div>
                        <div class="row">
                            @error('radioUpgradePosition')
                                <small class="col-6 text-danger">{{ $message }}</small>
                            @enderror
                            @error('radioEffectiveDatePosition')
                                <small class="col-6 text-danger">{{ $message }}</small>
                            @enderror
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
                                        class="form-control underline-input px-2  @error('job_title_from')
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
                                        class="form-control underline-input px-2  @error('job_title_from')
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
                                        class="form-control underline-input px-2   @error('job_level_from')
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
                                        class="form-control underline-input px-2   @error('job_level_to')
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
                                        class="form-control underline-input px-2   @error('department_from')
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
                                        class="form-control underline-input px-2   @error('department_to')
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
                                        class="form-control underline-input px-2   @error('supervisor_from')
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
                                        class="form-control underline-input px-2   @error('supervisor_to')
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
                                        class="form-control underline-input px-2   @error('employment_status_from')
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
                                        class="form-control underline-input px-2   @error('employment_status_to')
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
                        <div class="row g-2 align-items-baseline">
                            <h6 class="col-5 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-3 fw-bold text-end">Effective Date:</h6>
                            <div class="col-4">
                                <input type="date" class="form-control underline-input px-2"
                                    name="radioEffectiveDateSalary" id="radioEffectiveDateSalary"
                                    value="{{ old('radioEffectiveDateSalary', $personnelForm->salaryAdjustments->effective_date) }}">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Performance Review"
                                        {{ old('radioUpgradeSalary') == 'Performance Review' ? 'checked' : '' }}>
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Promotion" {{ old('radioUpgradeSalary') == 'Promotion' ? 'checked' : '' }}>
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Lateral Transfer"
                                        {{ old('radioUpgradeSalary') == 'Lateral Transfer' ? 'checked' : '' }}>
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeSalary"
                                        value="Others" {{ old('radioUpgradeSalary') == 'Others' ? 'checked' : '' }}>
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group other-input mt-2" id="otherUpgradeSalary" style="display: none;">
                            <input type="text" class="form-control" name="otherUpgradeSalary"
                                placeholder="Other Reason">
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
                                    <input type="text"
                                        class="form-control underline-input px-2   @error('basic_salary_from')
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
                                        class="form-control underline-input px-2   @error('basic_salary_to')
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
                        <div class="row g-2 align-items-baseline">
                            <h6 class="col-5 fw-bold">Reason for upgrade:</h6>
                            <h6 class="col-3 fw-bold text-end">Effective Date:</h6>
                            <div class="col-4">
                                <input type="date" class="form-control underline-input px-2"
                                    name="radioEffectiveDateCharges" id="radioEffectiveDateCharges"
                                    value="{{ old('radioEffectiveDateCharges', $personnelForm->benefitAdjustments->effective_date) }}">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Performance Review"
                                        {{ old('radioUpgradeCharges') == 'Performance Review' ? 'checked' : '' }}>
                                    <label class="form-check-label">Performance Review</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Promotion"
                                        {{ old('radioUpgradeCharges') == 'Promotion' ? 'checked' : '' }}>
                                    <label class="form-check-label">Promotion</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Lateral Transfer"
                                        {{ old('radioUpgradeCharges') == 'Lateral Transfer' ? 'checked' : '' }}>
                                    <label class="form-check-label">Lateral Transfer</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-input" type="radio" name="radioUpgradeCharges"
                                        value="Others" {{ old('radioUpgradeCharges') == 'Others' ? 'checked' : '' }}>
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group other-input mt-2" id="otherUpgradeCharges" style="display:none;">
                            <input type="text" class="form-control" name="otherUpgradeCharges"
                                placeholder="Other Reason">
                        </div>
                        <div class="row">
                            @error('radioUpgradeCharges')
                                <small class="col-6 text-danger">{{ $message }}</small>
                            @enderror
                            @error('radioEffectiveDateCharges')
                                <small class="col-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row g-2 mt-3 text-center">
                            <h6 class="col-6 fw-bold">Food Allowance</h6>
                            <h6 class="col-6 fw-bold">Vacation Leave</h6>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col-3">
                                    <input type="text"
                                        class="form-control underline-input px-2   @error('food_allowance_from')
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
                                        class="form-control underline-input px-2   @error('food_allowance_to')
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
                                        class="form-control underline-input px-2   @error('vacation_leave_from')
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
                                        class="form-control underline-input px-2   @error('vacation_leave_to')
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
                                        class="form-control underline-input px-2   @error('sick_leave_from')
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
                                        class="form-control underline-input px-2   @error('sick_leave_to')
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
                                        class="form-control underline-input px-2   @error('birthday_leave_from')
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
                                        class="form-control underline-input px-2   @error('birthday_leave_to')
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
                                    class="form-control border   @error('remarkable_performance')
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
                                    class="form-control border   @error('rooms_for_improvements')
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
                                        class="form-control underline-input px-2   @error('manager_name')
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
                                        class="form-control underline-input px-2   @error('received')
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
                                    <input type="date" class="form-control underline-input px-2 border-dark "
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
