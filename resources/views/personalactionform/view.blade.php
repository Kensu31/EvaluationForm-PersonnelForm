@extends('layouts.app')
@section('title')
    Personnel Actions Forms
@endsection

@section('content')
    <div class="container">
        <div class="container mt-5 mb-5">
            <div class="card m-auto border shadow p-3 rounded rounded-4">
                <div class="card-title mt-2 border-bottom">
                    <h2 class="px-5 py-2">Personnel Action Forms</h2>
                </div>
                <div class="card-body px-5 mt-4">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <th class="col-6">Employee's Name</th>
                                <th class="col-3">Date Submit</th>
                                <th class="col-3">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($personnelForm as $forms)
                                    <tr class="text-middle">
                                        <td class="col align-middle">{{ $forms->last_name }} {{ $forms->first_name }}</td>
                                        <td class="col align-middle">{{ $forms->created_at }}</td>
                                        <td class="col">
                                            <a href="/personnel-form/{{ $forms->id }}"
                                                class="btn btn-success btn-sm px-4 text-center"
                                                onclick="return confirm('Are you sure you want to edit this form?')">
                                                <i class="fas fa-pencil-alt px-1"></i>Edit
                                            </a>
                                            <a href="/personnel-form/{{ $forms->id }}"
                                                class="btn btn-danger btn-sm px-4 text-center"
                                                onclick="return confirm('Are you sure you want to edit this form?')">
                                                <i class="fas fa-trash px-1"></i>Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
