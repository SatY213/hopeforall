@extends('layouts.app')

@section('content')
@include('include-dashboard')
    <div class="container" style="margin-left: 7cm;">
        <div class="row">
            <div class="col-md-12">
                <h3>Fees</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Amount</th>
                                    <th>From</th>
                                    <th>To</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fees as $fee)
                                <tr>
                                    <td>{{ $fee->member}}</td>
                                    <td>{{ $fee->amount }}</td>
                                    <td>{{ $fee->from }}</td>
                                    <td>{{ $fee->to }}</td>
                                    <td>{{ $fee->created_at }}</td>
                                    <td>
                                        <div style="display: flex;">
                                            <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#fee{{ $fee->id }}">Detail</button>
                                            <div style="width: 10px;"></div>
                                            <form method="POST" action="{{ route('fees.destroy', $fee->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="fee{{ $fee->id }}" tabindex="-1" role="dialog" aria-labelledby="fee{{ $fee->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="{{ $fee->id }}Label">fee Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Member:</strong> {{ $fee->member }}</p>
                                                        <p><strong>Amount:</strong> {{ $fee->amount }}</p>
                                                        <p><strong>From:</strong> {{ $fee->from}}</p>
                                                        <p><strong>to:</strong> {{ $fee->to }}</p>
                                                        <p><strong>Date Of Creation:</strong> {{ $fee->created_at }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                <!-- Fee Details Modal End -->
                                @endforeach
                            </tbody>
                        </table>

                        <div class="float-right">
                            <a href="{{ route('fees.create') }}" class="btn btn-success">Add Fee</a>
                            <a href="/dashboard" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                        </div>
                  
            </div>
        </div>
    </div>
@endsection    
