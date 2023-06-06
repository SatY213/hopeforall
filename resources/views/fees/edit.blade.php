<!-- edit.blade.php -->

@extends('layouts.app')
@include('include-dashboard')
@section('content')
    <div class="container" style="margin-left: 7cm">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Fee</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('fees.update', $fee->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="member">Member</label>
                                <select class="form-control" id="member" name="member" required>
                                    <option value="">Select a member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->name }}" {{ $fee->member_id == $member->id ? 'selected' : '' }}>
                                            {{ $member->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" value="{{ $fee->amount }}" required>
                            </div>

                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="date" class="form-control" id="from" name="from" value="{{ $fee->from }}" required>
                            </div>

                            <div class="form-group">
                                <label for="to">To</label>
                                <input type="date" class="form-control" id="to" name="to" value="{{ $fee->to }}" required>
                            </div>
<br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/fees" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
