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
    <div class="container">
        <div class="container mt-5 mb-5">
            <div class="card m-auto border shadow p-3 rounded rounded-4">
                <div class="card-title mt-2 border-bottom">
                    <div class="row">
                        <h2 class="col-6 px-5 py-2">Personnel Action Forms</h2>
                        <div class="col-6 text-end">
                            <a href="/add/personnelform" class="btn btn-success mt-2"><i class="fas fa-plus mx-2"></i>Create
                                Form</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-5 mt-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-secondary py-3">
                                <th class="col-6 py-3">Employee's Name</th>
                                <th class="col-3 py-3">Date Submit</th>
                                <th class="col-3 py-3 text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($personnelForm as $forms)
                                    <tr class="text-middle">
                                        <td class="col align-middle">{{ $forms->last_name }} {{ $forms->first_name }}
                                        </td>
                                        <td class="col align-middle">{{ $forms->created_at }}</td>
                                        <td class="col text-center">
                                            <button class="btn btn-success  px-2 text-center"
                                                onclick="confirmEdit({{ $forms->id }})">
                                                <i class="fas fa-pencil-alt px-1"></i>
                                            </button>
                                            <button class="btn btn-danger  px-2 text-center"
                                                onclick="confirmDelete({{ $forms->id }})">
                                                <i class="fas fa-trash px-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
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
