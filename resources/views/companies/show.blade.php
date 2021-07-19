@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Company</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $company->name }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $company->email }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Logo:</strong>
            <img src="{{ asset('storage/'.$company->logo) }}" width="100" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Website:</strong>
            {{ $company->website }}
        </div>
    </div>



</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop