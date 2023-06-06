@extends('layouts.app')

@section('content')
@include('include-dashboard')
<div class="container" style="margin-left: 7cm;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Donation Details</div>

                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{{ $donation->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ $donation->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Amount:</strong></td>
                                <td>{{ $donation->amount }}</td>
                            </tr>
                            <tr>
                                <td><strong>Message:</strong></td>
                                <td>{{ $donation->message ?: 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created At:</strong></td>
                                <td>{{ $donation->created_at }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated At:</strong></td>
                                <td>{{ $donation->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="float-right">
                        <a href="{{ route('donation.index') }}" class="btn btn-secondary">Back</a>
                        <a href="{{ route('donation.edit', $donation->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('donation.destroy', $donation->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
