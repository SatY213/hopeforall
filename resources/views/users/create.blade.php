@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-left: 7cm;">
    <div class="row">
        <div class="col-md-3 sidebar-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Add a User</h3></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal']) !!}
               
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
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', 'password', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('isadmin') ? ' has-error' : '' }}">
                        {!! Form::label('isadmin', 'Admin', ['class' => 'control-label']) !!}
                        {!! Form::select('isadmin', [1 => 'Yes', 0 => 'No'], old('isadmin'), ['class' => 'form-control', 'required' => 'required']) !!}
                        @if ($errors->has('isadmin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('isadmin') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                  


                        <br>
                        <div class="form-group">
                        {!! Form::submit('Add User', ['class' => 'btn btn-primary']) !!}
                        <a href="/users" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                        </div>
                        {!! Form::close() !!}
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        </div>
                        @endsection
