@extends('layouts.app')
@section('title')
    Personnel Actions Forms
@endsection

@section('content')
    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session()->get('success') }}",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
    <div class="container-fluid">
        <div class="container-fluid mt-5 mb-5">
            <div class="card m-auto border shadow p-3 rounded rounded-4">
                <div class="card-title mt-2 border-bottom">
                    <div class="row">
                        <h2 class="col-6 px-5 py-2">Personnel Action Forms</h2>
                        <div class="col-6 text-end">
                            <button data-bs-toggle="modal" data-bs-target="#selectEmployee" class="btn btn-success mt-2"><i
                                    class="fas fa-plus mx-2"></i>Create
                                Form</button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-5 mt-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table py-3">
                                <th class="col-6 py-3">Title</th>
                                <th class="col-3 py-3">Date Submit</th>
                                <th class="col-3 py-3 text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($personnelForm as $forms)
                                    <tr class="text-middle">
                                        <td class="col align-middle">Personnel Action form for
                                            {{ $forms->employee->last_name }}
                                            {{ $forms->employee->first_name }}
                                        </td>
                                        <td class="col align-middle">{{ $forms->created_at }}</td>
                                        <td class="col text-center">
                                            <button class="btn btn-primary  px-2 text-center"
                                                onclick="view({{ $forms->id }})">
                                                <i class="fas fa-eye px-1"></i>
                                            </button>
                                            <button class="btn btn-success  px-2 text-center"
                                                onclick="confirmEdit({{ $forms->id }})">
                                                <i class="fas fa-pencil-alt px-1"></i>
                                            </button>
                                            <button class="btn btn-danger  px-2 text-center"
                                                onclick="confirmDelete({{ $forms->id }})">
                                                <i class="fas fa-trash px-1"></i>
                                            </button>
                                            <button class="btn btn-secondary  px-2 text-center" onclick="">
                                                <i class="fas fa-print px-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="selectEmployee" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="selectEmployeeLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="selectEmployeeLabel">Personnel Action Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <select id="EmployeeSelect" class="form-select" aria-label="Default select example"
                                            onchange="change(event)" required>
                                            <option disabled selected>Select Employee</option>
                                            @foreach ($employee as $employees)
                                                <option value="{{ $employees->id }}">{{ $employees->last_name }}
                                                    {{ $employees->first_name }}
                                                </option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            onclick="return cancel(event)">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="btnselect"
                                            onclick="return select(event)" disabled>Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function change(event) {
                                var val = this.value;
                                var btnretrieve = document.getElementById('btnselect');
                                if (val == 'Select Employee') {} else {
                                    btnretrieve.disabled = false
                                }
                            }

                            function select(event) {
                                var employeee = document.getElementById('EmployeeSelect');
                                var btnretrieve = document.getElementById('btnselect');

                                var selectedValue = employeee.value;

                                window.location.href = "/personnel/form/" + selectedValue;
                            }

                            function confirmDelete($id) {
                                return Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'You are about to delete this form.',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '/delete-form/' + $id;
                                    }


                                });
                            }

                            function view($id) {
                                window.location.href = '/personnel-form/viewonly/' + $id
                            }

                            function confirmEdit($id) {
                                return Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'You are about to edit this form.',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, edit it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '/personnel-form/' + $id;
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
