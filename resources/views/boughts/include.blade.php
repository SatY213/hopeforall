<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">


                <div class="panel-body">
                    <table class="table table-striped" id="myTable2" class="table table-striped" style="display: none;">
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
   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleTable2() {
      var table = document.getElementById("myTable2");
      if (table.style.display === "none") {
        table.style.display = "table";
      } else {
        table.style.display = "none";
      }
    }
  </script>
