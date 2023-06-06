
    <div class="container" style="margin-left: 7cm;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bought Item Details</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="project">Project:</label>
                            <p>{{ $bought->project->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="product">Product:</label>
                            <p>{{ $bought->product }}</p>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <p>{{ $bought->quantity }}</p>
                        </div>
                        <div class="form-group">
                            <label for="unit_price">Unit Price:</label>
                            <p>{{ $bought->unit_price }}</p>
                        </div>
                        <a href="/boughts" class="btn btn-primary">Back</a>
                        <a href="{{ route('boughts.edit', $bought->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('boughts.destroy', $bought->id) }}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this bought item?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

