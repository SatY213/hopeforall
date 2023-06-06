@extends('layouts.app')

@section('content')


    <div class="container" style="margin-left: 7cm;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Users</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>isadmin</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->isadmin }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <div style="display: flex; ">
                                            <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#user{{ $user->id }}">Detail</button>
                                            <div style="width: 10px;"></div>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="user{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="user{{ $user->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="user{{ $user->id }}Label">{{ $user->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                                <p><strong>Isadmin:</strong> {{ $user->isadmin }}</p>
                                                <p><strong>Created at:</strong> {{ $user->created_at }}</p>
                                                @foreach ($fees as $fee)
                                                @if ($user->name == $fee->member)
                                                <p><strong>Fee Amount:</strong> {{ $fee->amount }}</p>
                                                @else
                                                <p>No fee found for this user.</p>
                                            @endif
                                        
                                            @endforeach
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info mr-2">Show</a>

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
                        <a href="/dashboard" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                    </div>
                </div>
            </div>
        </div>
@endsection        
   
    <!-- <script>
    // Show confirmation message before deleting a needer
    $('form').submit(function (event) {
    var form = this;
    event.preventDefault();
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this needer!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
    form.submit();
    } else {
    swal("The needer is safe!");
    }
    });
    });
    </script>
-->
   
    
    
    
    
    
    