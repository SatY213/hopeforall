<div class="container">
    <div class="row">
        <div class="col-md-12">



                    <table id="myTable" class="table table-striped" style="display: none;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Job</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($benevoles as $benevole)
                                <tr>
                                    <td>{{ $benevole->id }}</td>
                                    <td>{{ $benevole->name }}</td>
                                    <td>{{ $benevole->birthday }}</td>
                                    <td>{{ $benevole->job }}</td>
                                    <td>{{ $benevole->email }}</td>
                                    <td>{{ $benevole->address }}</td>
                                    <td>{{ $benevole->phone }}</td>
                                    <td>
                                        <div style="display: flex;">
                                            <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#benevole{{ $benevole->id }}">Details</button>
                                            <div style="width: 10px;"></div>
                                            <form method="POST" action="{{ route('benevoles.destroy', $benevole->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('benevoles.edit', $benevole->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>

                                                                              <!-- Modal -->
                                                                              <div class="modal fade" id="benevole{{ $benevole->id }}" tabindex="-1" role="dialog" aria-labelledby="benevole{{ $benevole->id }}Label" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="benevole{{ $benevole->id }}Label">Benevole Details</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p><strong>Name:</strong> {{ $benevole->name }}</p>
                                                                                            <p><strong>Birthday:</strong> {{ $benevole->birthday }}</p>
                                                                                            <p><strong>Job:</strong> {{ $benevole->job }}</p>
                                                                                            <p><strong>Email:</strong> {{ $benevole->email }}</p>
                                                                                            <p><strong>Address:</strong> {{ $benevole->address }}</p>    
                                                                                            <p><strong>Phone:</strong> {{ $benevole->phone }}</p>

                                                                                        </div>
                            
                                                                            
                                                                        
                            
                            
                            
                            
                            
                            
                                                                                        <div class="modal-footer d-flex justify-content-between">
                                                                                            <a class="btn btn-sm btn-info float-right" href="{{ route('benevoles.getProjects', ['benevole' => $benevole->id]) }}">Get Projects</a>                                                                                                  
                                                                                            <div>
                                                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                          </div>
                                                                                          
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>                
                            
                            
                                                                </td>   
                                                                    
                                                            <!-- Project Details Modal End -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
    </div>
</div>
<script>
    function toggleTable() {
      var table = document.getElementById("myTable");
      if (table.style.display === "none") {
        table.style.display = "table";
      } else {
        table.style.display = "none";
      }
    }
  </script>
