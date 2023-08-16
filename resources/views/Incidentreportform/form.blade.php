@extends('layouts.app')
@section('title')
    Incident report
@endsection
@section('content')
    <div class="container">
        <div class="card m-auto mt-5 mb-5 border shadow p-3 rounded rounded-4">
            <div class="card-title mt-2 border-bottom text-center">
                <h2 class="fw-bold">INCIDENT REPORT FORM</h2>
            </div>
            <form action="/submit-incident-form" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <h5 class="fw-bold">EMPLOYEE DETAILS</h5>
                    </div>
                    <div class="row align-middle mt-3">
                        <div class="col-2 text-end align-self-center">EMPLOYEE NAME:</div>
                        <div class="col-4"><input type="text" class="form-control border-dark"
                                value="{{ $employeeInfo->last_name }} {{ $employeeInfo->first_name }}" readonly /></div>
                        <div class="col-2 text-end align-self-center">DATE:</div>
                        <div class="col-4"><input type="date" name="report_date" class="form-control border-dark"></div>
                    </div>
                    <div class="row align-middle mt-3">
                        <div class="col-2 text-end align-self-center">POSITION:</div>
                        <div class="col-4"><input type="text" class="form-control border-dark"
                                value="{{ $employeeInfo->position }}" readonly></div>
                        <div class="col-2 text-end align-self-center">PHONE:</div>
                        <div class="col-4"><input type="text" id="phone" placeholder="+639-000-000-0000"
                                class="form-control border-dark" oninput="maskPhoneNumber()">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h5 class="fw-bold">DESCRIPTION OF INCIDENT</h5>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="col-2  text-end align-middle">
                                            LOCATION:
                                        </td>
                                        <td class="col-10 " colspan="3">
                                            <input type="text" class="form-control border-dark " name="location" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-2  text-end align-middle">
                                            DATE:
                                        </td>
                                        <td class="col-4">
                                            <input type="date" class="form-control border-dark " name="incident_date" />
                                        </td>
                                        <td class="col-1  text-end align-middle">
                                            TIME:
                                        </td>
                                        <td class="col-4">
                                            <input type="text" class="form-control border-dark " name="incident_time" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3  text-end">
                                            INCIDENT INFORMATION:
                                        </td>
                                        <td class="col-10" colspan="3">
                                            <textarea class="form-control border-dark" name="incident_details" style="width: 100%; resize:none; height:200px"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-6 table-light" colspan="2">
                                            INCIDENT CAUSES:
                                        </td>
                                        <td class="col-6 table-light" colspan="2">
                                            FOLLOW UP RECOMMENDATIONS:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col" colspan="2">
                                            <textarea class="form-control border-dark" name="cause" style="width: 100%; resize:none; height:200px"></textarea>
                                        </td>
                                        <td class="col" colspan="2">
                                            <textarea class="form-control border-dark" name="recommendation" style="width: 100%; resize:none; height:200px"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="container text-end ">
                        <div class="row ">
                            <div class="col-7">
                                REPORTED BY:
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-7 py-2">
                                NAME:
                            </div>
                            <div class="col">
                                <input type="text" name="reportedby" class="form-control border-dark">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7 py-2">
                                POSITION:
                            </div>
                            <div class="col-5">
                                <input type="text" name="position" class="form-control border-dark">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7 py-2">
                                DEPARTMENT:
                            </div>
                            <div class="col-5">
                                <input type="text" name="department" class="form-control border-dark">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7 py-2">
                                SUPERVISOR:
                            </div>
                            <div class="col-5">
                                <input type="text" name="supervisor" class="form-control border-dark">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7 py-2">
                                SUPERVISOR:
                            </div>
                            <div class="col-5">
                                <input type="text" name="employee_id" class="hidden" value="{{ $employeeInfo->id }}">
                            </div>
                        </div>
                    </div>
                    <div class="container text-end mt-3 px-3">
                        <div>
                            <button class="btn btn-success">
                                <i class="fas fa-save mx-2"></i>
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
    <script>
        function maskPhoneNumber() {
            const input = document.getElementById('phone');
            const value = input.value.replace(/\D/g, '').slice(0, 12); // Remove non-numeric characters
            const maskedValue = mask(value);
            input.value = maskedValue;
        }

        function mask(phoneNumber) {
            const countryCode = '+639';
            const remainingDigits = phoneNumber.slice(3); // Remove country code
            const firstPart = remainingDigits.slice(0, 3);
            const secondPart = remainingDigits.slice(3, 6);
            const thirdPart = remainingDigits.slice(6);

            return `${countryCode} ${firstPart} ${secondPart} ${thirdPart}`;
        }
    </script>
@endsection
