@extends('layouts.app')

@section('content')
@include('include-dashboard')


<div class="container-fluid" style="margin-left: 7cm;">
    <div class="row">
        <div class="col-md-3 sidebar-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Add a Needer</h3></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'needers.store', 'class' => 'form-horizontal']) !!}
               
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => 'required']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'required' => 'required']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
                        {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'required' => 'required']) !!}
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->firstf('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
                        {!! Form::select('type', ['Father' => 'Father', 'Mother' => 'Mother', 'Mother divorced', 'Father divorced' , 'Single'], old('type'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select a type']) !!}
                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                        {!! Form::label('job', 'Job', ['class' => 'control-label']) !!}
                        {!! Form::text('job', old('job'), ['class' => 'form-control']) !!}
                        @if ($errors->has('job'))
                            <span class="help-block">
                                <strong>{{ $errors->first('job') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                        {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                        {!! Form::label('birthday', 'Birthday', ['class' => 'control-label']) !!}
                        {!! Form::date('birthday', old('birthday'), ['class' => 'form-control']) !!}
                        @if ($errors->has('birthday'))
                        <span class="help-block">
                        <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('children') ? ' has-error' : '' }}">
                            {!! Form::label('children', 'Children', ['class' => 'control-label']) !!}
                            {!! Form::number('children', old('children'), ['class' => 'form-control']) !!}                            @if ($errors->has('children'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('children') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            {!! Form::label('salary', 'Salary', ['class' => 'control-label']) !!}
                            {!! Form::number('salary', old('salary'), ['class' => 'form-control']) !!}                            @if ($errors->has('children'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('salary') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}                            @if ($errors->has('children'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>



                        <br>
                        <div class="form-group">
                        {!! Form::submit('Add Needer', ['class' => 'btn btn-primary']) !!}
                        <a href="/needers" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                        </div>
                        {!! Form::close() !!}
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        </div>
                        @endsection
