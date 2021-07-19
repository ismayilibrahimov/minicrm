@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
@stop

@section('content_header')
<h1>{{ __('admin.employees') }}</h1>
@stop


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('employees.create') }}"> {{ __('admin.Create New Employee') }}</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success mb-2" id="successMessage">
    <p>{{ $message }}</p>
</div>
@endif



<section class="content d-flex justify-content-center">
    <div class="row">
        <table id="pageTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>
                        {{ $employee->first_name }}
                    </td>
                    <td>
                        {{ $employee->last_name }}
                    </td>
                    <td>
                        {{ $employee->email }}
                    </td>
                    <td>
                        {{ $employee->phone }}
                    </td>
                    <td>
                        <a href="{{ route('companies.show', $employee->company_id) }}">{{ $employee->company->name }}</a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('employees.show', $employee->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@stop



@section('js')
<script>
    $(document).ready(function() {
        $('#pageTable').DataTable();
    });

    setTimeout(function() {
        $('#successMessage').fadeOut('fast');
    }, 2000);
</script>
@stop