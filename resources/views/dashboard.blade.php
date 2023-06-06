@extends('layouts.app')

@section('content')

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/posts">
                    <i class="fa fa-fw fa-file"></i> Posts
                </a>
            </li>
            <li class="nav-item">
                
                <a class="nav-link" href="/donation" data-toggle="ajax" data-target="#content-container">

                    <i class="fa fa-fw fa-money"></i> Donations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/boughts">
                    <i class="fa fa-fw fa-shopping-cart"></i> Boughts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/needers" data-toggle="ajax" data-target="#content-container">
                    <i class="fa fa-fw fa-users"></i> Needers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/projects">
                    <i class="fa fa-fw fa-users"></i> Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/benevoles">
                    <i class="fa fa-fw fa-users"></i> Benevoles
                </a>
            </li>
 
            @if (auth()->user()->isadmin)
            <h3 class="text-primary" style="font-size:20px">Admin Options</h3>

                <li class="nav-item">
                    <a class="nav-link" href="/users">
                        <i class="fa fa-fw fa-users"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fees">
                        <i class="fa fa-fw fa-shopping-cart"></i> Fees
                    </a>
                </li>

        @endif


        </ul>
    </div>
</nav>

<style>
    .sidebar {
        height: 100%;
        margin-left: 0;
        left: 02px;
        position: absolute;;
        top:91px;
        overflow-x: hidden;
        overflow-y: auto;
        padding-top: 22px;
        z-index: 1;
        background-color: blue;
        
        border-right: 1px solid #045cff;
    }

    .sidebar-sticky {
        position: relative;
        top: 0px;
        height: calc(100vh - 48px);
        padding: 1rem 1rem 1rem 0;
        overflow-x: hidden;
        overflow-y: auto;
        background-color: rgba(194, 190, 190, 0);

    }

    .sidebar .nav-link {
        
        font-weight: 500;
        color: #666;
        padding: 0.5rem 1rem;
        border-radius: 0;
        transition: all 0.2s ease-in-out;
        border-left: 3.3px solid transparent;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background-color: #f9f9f9;
        color: #007bff;
        border-left-color: #007bff;
    }

    .sidebar .nav-link i {
        margin-right: 0.4rem;
    }
    #main {
    width: 100%;


}


    
</style>



        <!-- Main Content -->
        <main role="main" id ="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}
                
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" width="800" height="400"></canvas>

            
                                <div class="panel-body" id="content-container">
                                    <form method="get" action="{{ route('dashboard') }}">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <input type="number" name="year" class="form-control" placeholder="Enter Year" value="{{ $year }}" min="1900" max="{{ date('Y') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <select name="month" class="form-control">
                                                    <option value="">Select Month</option>
                                                    <option value="1" {{ $month == '1' ? 'selected' : '' }}>January</option>
                                                    <option value="2" {{ $month == '2' ? 'selected' : '' }}>February</option>
                                                    <option value="3" {{ $month == '3' ? 'selected' : '' }}>March</option>
                                                    <option value="4" {{ $month == '4' ? 'selected' : '' }}>April</option>
                                                    <option value="5" {{ $month == '5' ? 'selected' : '' }}>May</option>
                                                    <option value="6" {{ $month == '6' ? 'selected' : '' }}>June</option>
                                                    <option value="7" {{ $month == '7' ? 'selected' : '' }}>July</option>
                                                    <option value="8" {{ $month == '8' ? 'selected' : '' }}>August</option>
                                                    <option value="9" {{ $month == '9' ? 'selected' : '' }}>September</option>
                                                    <option value="10" {{ $month == '10' ? 'selected' : '' }}>October</option>
                                                    <option value="11" {{ $month == '11' ? 'selected' : '' }}>November</option>
                                                    <option value="12" {{ $month == '12' ? 'selected' : '' }}>December</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


  
  


<script>
    var chartData = {!! $jsData !!}; // Get chart data from the view
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Total Donations',
                data: chartData.data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return '$' + value;
                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Total Donations'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }]
            }
        }
    });
</script>




  




@endsection
