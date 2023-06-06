@extends('layouts.app')

@section('content')
@include('include-dashboard')


    <div class="container" style="margin-left: 7cm;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Boughts</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                   
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Project</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($boughts as $bought)
                                <tr>
                                   
                                    <td>{{ $bought->product }}</td>
                                    <td>{{ $bought->quantity }}</td>
                                    <td>{{ $bought->unit_price }}</td>
                                    <td>{{ $bought->project->name }}</td>
                                    <td>
                                        <div style="display: flex; ">
                                            <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#bought{{ $bought->id }}">Detail</button>
                                            <div style="width: 10px;"></div>
                                            <form method="POST" action="{{ route('boughts.destroy', $bought->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('boughts.edit', $bought->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="bought{{ $bought->id }}" tabindex="-1" role="dialog" aria-labelledby="bought{{ $bought->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="bought{{ $bought->id }}Label">{{ $bought->product}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Price:</strong> {{ $bought->unit_price }}</p>
                                                <p><strong>Quantity:</strong> {{ $bought->quantity }}</p>
                                                <p><strong>Total Cost:</strong> {{ $bought->total_cost }}</p>
                                                <p><strong>Project name:</strong> {{ $bought->project->name }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <a href="{{ route('boughts.create') }}" class="btn btn-success float-left mr-2">Add Bought</a>
                        <a href="/dashboard" class="btn btn-outline-secondary float-right ml-2">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
