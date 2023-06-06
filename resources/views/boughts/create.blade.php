@extends('layouts.app')

@section('content')
@include('include-dashboard')


    <div class="container col-md-3 sidebar-container" style="margin-left: 7cm;">
        <h1>Create Bought Item</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('boughts.store') }}">
            @csrf

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product">Product</label>
                <input type="text" name="product" id="product" class="form-control" value="{{ old('product') }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" value="{{ old('unit_price') }}" required>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/boughts" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

        </form>
    </div>
@endsection
