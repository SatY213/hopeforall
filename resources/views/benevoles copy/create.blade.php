@extends('layouts.app')

@section('content')
@include('include-dashboard')

    <div class="container" style="margin-left: 6cm; width:15cm;">
        <h1>Create Benevole</h1>
        <form method="POST" action="{{ route('benevoles.store') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                <div class="col-md-6">
                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                           name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label>

                <div class="col-md-6">
                    <input id="job" type="text" class="form-control @error('job') is-invalid @enderror" name="job"
                           value="{{ old('job') }}" required autocomplete="job">

                    @error('job')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
            
                <div class="col-md-6">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
            
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
            
                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
            
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            

            <div class="form-group">
                <label for="projects">Projects</label>
                <select class="form-control" id="projects" name="projects" multiple>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            
        <br>
            <div class="form-group">
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                <a href="/benevoles" class="btn btn-outline-secondary float-right ml-2">Go Back</a>
              </div>
          
            
            </form>
        </div>  
@endsection            
