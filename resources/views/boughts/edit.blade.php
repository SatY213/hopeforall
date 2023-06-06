@extends('layouts.app')
@section('content')
@include('include-dashboard')

    <div class="container" style="margin-left: 7cm;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Edit Bought</h3></div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('boughts.update', $bought->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                                <label for="project_id" class="col-md-4 control-label">Project</label>

                                <div class="col-md-6">
                                    <select name="project_id" id="project_id" class="form-control">
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}"{{ $bought->project_id == $project->id ? ' selected' : '' }}>{{ $project->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('project_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('project_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
                                <label for="product" class="col-md-4 control-label">Product</label>

                                <div class="col-md-6">
                                    <input id="product" type="text" class="form-control" name="product" value="{{ $bought->product }}" required autofocus>

                                    @if ($errors->has('product'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <label for="quantity" class="col-md-4 control-label">Quantity</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $bought->quantity }}" required>

                                    @if ($errors->has('quantity'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('unit_price') ? ' has-error' : '' }}">
                                <label for="unit_price" class="col-md-4 control-label">Unit Price</label>

                                <div class="col-md-6">
                                    <input id="unit_price" type="number" class="form-control" name="unit_price" value="{{ $bought->unit_price }}" step="0.01" required>

                                    @if ($errors->has('unit_price'))
                                        <span class ="help-block">
                                            <strong>{{ $errors->first('unit_price') }}</strong>
                                            </span>
                                            @endif
                                            </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update
                                                    </button>
                                                    <a href="/boughts" class="btn btn-outline-secondary float-right ml-2">Go Back</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection                    
