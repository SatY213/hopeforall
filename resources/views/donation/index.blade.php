@extends('layouts.app')

@section('content')
@include('include-dashboard')
    <div class="container" style="margin-left: 7cm;">
        <div class="row">
            <div class="col-md-12">
                <h3>Donations</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Date Of Donation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($donations as $donation)
                                <tr>
                                    <td>{{ $donation->name }}</td>
                                    <td>{{ $donation->email }}</td>
                                    <td>{{ $donation->amount }}</td>
                                    <td>{{ $donation->created_at }}</td>
                                    <td>
                                        <div style="display: flex;">
                                            <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#donation{{ $donation->id }}">Detail</button>
                                            <div style="width: 10px;"></div>
                                            <form method="POST" action="{{ route('donation.destroy', $donation->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('donation.edit', $donation->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="donation{{ $donation->id }}" tabindex="-1" role="dialog" aria-labelledby="donation{{ $donation->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="donation{{ $donation->id }}Label">Donation Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Name:</strong> {{ $donation->name }}</p>
                                                        <p><strong>Email:</strong> {{ $donation->email }}</p>
                                                        <p><strong>Amount:</strong> {{ $donation->amount }}</p>
                                                        <p><strong>Message:</strong> {{ $donation->message }}</p>
                                                        <p><strong>Date Of Donation:</strong> {{ $donation->created_at }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                <!-- Donation Details Modal End -->
                                @endforeach
                            </tbody>
                        </table>

                        <div class="float-right">
                            <a href="{{ route('donation.create') }}" class="btn btn-success">Add Donation</a>
                            <a href="/dashboard" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                        </div>
                  
            </div>
        </div>
    </div>
@endsection    
