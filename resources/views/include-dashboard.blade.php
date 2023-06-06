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
                        <i class="fa fa-fw fa-users"></i> fees
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



        
    </div>
</div>