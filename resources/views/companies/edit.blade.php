@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Company</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" value="{{ $company->email }}" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                <input type="file" name="logo" value="{{ $company->logo }}" class="form-control" placeholder="Logo">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Website:</strong>
                <input type="text" name="website" value="{{ $company->website }}" class="form-control" placeholder="Website">
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop