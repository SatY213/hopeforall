@extends('layouts.app')

@section('content')
@include('include-dashboard')
<div class="container-fluid" style="margin-left: 7cm;">
    <div class="row">
        <div class="col-md-3 sidebar-container">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Make a Donation<h3></div>
            <div class="panel-body">
              {!! Form::open(['route' => 'donation.store', 'class' => 'form-horizontal']) !!}
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
                {!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'required' => 'required']) !!}
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                {!! Form::label('amount', 'Donation Amount', ['class' => 'control-label']) !!}
                {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!}
                @if ($errors->has('amount'))
                  <span class="help-block">
                    <strong>{{ $errors->first('amount') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                {!! Form::label('message', 'Message (optional)', ['class' => 'control-label']) !!}
                {!! Form::textarea('message', old('message'), ['class' => 'form-control', 'rows' => '4']) !!}
                @if ($errors->has('message'))
                  <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                  </span>
                @endif
              </div>
               <br>
               <div class="form-group">
                {!! Form::submit('Donate', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                <a href="/boughts" class="btn btn-outline-secondary float-right ml-2">Go Back</a>
              </div>
              


            </div>
          </div>
        </div>
      </div>

</div>
@endsection
