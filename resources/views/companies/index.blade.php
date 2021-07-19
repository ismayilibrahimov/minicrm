@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
@stop

@section('content_header')
<h1>{{ __('admin.companies')}}</h1>
@stop


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('companies.create') }}"> {{ __('admin.Create New Company') }}</a>
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
                    <th>{{ __('admin.Name') }}</th>
                    <th>{{ __('admin.Email') }}</th>
                    <th>{{ __('admin.Logo') }}</th>
                    <th>{{ __('admin.Website') }}</th>
                    <th>{{ __('admin.View') }}</th>
                    <th>{{ __('admin.Edit') }}</th>
                    <th>{{ __('admin.Delete') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>
                        {{ $company->name }}
                    </td>
                    <td>
                        {{ $company->email }}
                    </td>
                    <td>
                        {{ $company->logo }}
                    </td>
                    <td>
                        {{ $company->website }}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('companies.destroy',$company->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">Delete</button>
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