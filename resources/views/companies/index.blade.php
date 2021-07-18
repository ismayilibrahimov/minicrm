@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Companies</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Company</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Logo</th>
        <th>Website</th>
    </tr>
    @foreach ($companies as $company)
    <tr>
        <td>{{ $company->name }}</td>
        <td>{{ $company->email }}</td>
        <td><img src="{{ asset('storage/'.$company->logo) }}" width="100" /></td>
        <td>{{ $company->website }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
            <form action="{{ route('companies.destroy',$company->id) }}" method="POST">

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center">
    {!! $companies->links() !!}
</div>

@endsection