@extends('layouts.app')
@section('title')
    Employee List
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container-fluid mt-5 mb-5">
            <div class="card m-auto border shadow p-3 rounded rounded-4">
                <div class="card-title mt-2 border-bottom">
                    <div class="row">
                        <h4 class="col-6 px-5 py-2">Forms List</h4>

                    </div>
                    {{-- <div class="col-6 text-end">
                            <a href="/evaluation/form" class="btn btn-success mt-2"><i class="fas fa-plus mx-2"></i>Create
                                Form</a>
                        </div> --}}
                </div>
                <div class="card-body px-5 mt-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="py-3">
                                <th class="col-3 py-3">Form title</th>
                                <th class="col-3 py-3">Form type</th>
                                <th class="col-3 py-3">Date Created</th>
                            </thead>
                            <tbody>
                                {{-- @foreach ($employee as $employees)
                                    <tr class="text-middle">
                                        <td class="col align-middle">{{ $employees->last_name }}{{ $employees->first_name }}
                                        </td>
                                        <td class="col align-middle">{{ $employees->position }}</td>
                                        <td class="col align-middle">{{ $employees->date_hired }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
