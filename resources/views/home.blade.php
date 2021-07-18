@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="text-center">
                        <h4><a href="{{ route('companies.index') }}">Companies</a></h4>
                        <h4><a href="{{ route('employees.index') }}">Employees</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection