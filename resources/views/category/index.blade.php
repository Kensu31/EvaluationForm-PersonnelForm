@extends('layouts.app')

@section('title')
 Categories
@endsection

@section('content')
    <div class="container">
        <div class="card m-auto mt-5 mb-5 border shadow p-3 rounded rounded-4" style="width: 90%">
            <div class="card-title">
                <h1>Category list</h1>
            </div>
            <div class="card-body">
                <form action="" class="text-end">
                    <button class="btn btn-primary px-4 py-2">Add Category</button>
                </form>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Performance Category </th>
                                <th>Category Definition </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>    
@endsection
