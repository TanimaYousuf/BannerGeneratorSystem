<!-- partial:partials/_sidebar.html -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="row nav position-fixed">
        @if(Route::is('banners.index') || Route::is('banners.create') || Route::is('banners.show') || Route::is('banners.edit'))
            <li class="nav-item nav-active">
                <a class="nav-link active" href="{{route('banners.index')}}">
                    <img src="{{asset('backend/assets/img/dashboard-icon.png')}}" class="sidebar-icon">
                    <span class="menu-title"><b>DSD-Banners</b></span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('banners.index')}}">
                    <img src="{{asset('backend/assets/img/dashboard-icon-default.png')}}" class="sidebar-icon menu-non-active">
                    <img src="{{asset('backend/assets/img/dashboard-icon-default.png')}}" class="sidebar-icon menu-active">
                    <span class="menu-title">DSD-Banners</span>
                </a>
            </li>    
        @endif    
        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">
                <img src="{{asset('backend/assets/img/logout-icon-default.svg')}}" class="sidebar-icon menu-non-active">
                <img src="{{asset('backend/assets/img/logout-icon-default-active.svg')}}" class="sidebar-icon menu-active">
                <span class="menu-title">LOGOUT</span>
            </a>
        </li>
        
    </ul>
</nav>
<!-- partial -->
