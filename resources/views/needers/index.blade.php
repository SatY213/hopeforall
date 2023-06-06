@extends('layouts.app')

@section('content')


@include('include-dashboard')


<div class="container" style="margin-left: 7cm;">        
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Needers</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date Of need</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($needers as $needer)
                                <tr>
                                    <td>{{ $needer->name }}</td>
                                    <td>{{ $needer->email }}</td>
                                    <td>{{ $needer->created_at }}</td>
                                    <td>
                                        <div style="display: flex; ">
                                            <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#needer{{ $needer->id }}">Detail</button>
                                            <div style="width: 10px;"></div>
                                            <form method="POST" action="{{ route('needers.destroy', $needer->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('needers.edit', $needer->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="needer{{ $needer->id }}" tabindex="-1" role="dialog" aria-labelledby="needer{{ $needer->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="needer{{ $needer->id }}Label">{{ $needer->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Email:</strong> {{ $needer->email }}</p>
                                                <p><strong>Phone:</strong> {{ $needer->phone }}</p>
                                                <p><strong>Type:</strong> {{ $needer->type }}</p>
                                                <p><strong>Job:</strong> {{ $needer->job }}</p>
                                                <p><strong>Adresse:</strong> {{ $needer->adresse }}</p>
                                                <p><strong>Birthday:</strong> {{ $needer->birthday }}</p>
                                                <p><strong>Children:</strong> {{ $needer->children }}</p>
                                                <p><strong>Salary:</strong> {{ $needer->salary }}</p>
                                                <p><strong>Description:</strong> {{ $needer->description }}</p>
                                                <p><strong>Date Of need:</strong> {{ $needer->created_at }}</p>
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
                        <a href="{{ route('needers.create') }}" class="btn btn-success">Add Needer</a>
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
   
    
    
    
    
    
    