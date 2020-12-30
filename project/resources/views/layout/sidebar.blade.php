<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <!-- <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image"> -->
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{Auth::user()->name}}</p>

           
          </div>
        </div>
   
      </div>
    </li>
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboards</span>
      </a>
    </li>
   

    <li class="nav-item {{ active_class(['/Items']) }}">
      <a class="nav-link"  href="{{ url('/Items') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Items</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['/providers']) }}">
      <a class="nav-link"  href="{{ url('/providers') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Providers</span>
      </a>
    </li>

  




    {{-- <li class="nav-item {{ active_class(['basic-ui/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="{{ is_active_route(['basic-ui/*']) }}" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['basic-ui/*']) }}" id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['basic-ui/buttons']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/buttons') }}">Buttons</a>
          </li>
          <li class="nav-item {{ active_class(['basic-ui/dropdowns']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/dropdowns') }}">Dropdowns</a>
          </li>
          <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Typography</a>
          </li>
        </ul>
      </div>
    </li> --}}

    {{-- <li class="nav-item {{ active_class(['charts/chartjs']) }}">
      <a class="nav-link" href="{{ url('/charts/chartjs') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Charts</span>
      </a>
    </li> --}}
    <li class="nav-item {{ active_class(['inventories']) }}">
      <a class="nav-link" href="{{ url('/inventories') }}">
        <i class="menu-icon mdi mdi-playlist-plus"></i>
        <span class="menu-title">Inventory </span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['icons/material']) }}">
      <a class="nav-link" href="{{ url('/icons/material') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title">Icons</span>
      </a>
    </li>

    <li class="nav-item {{ active_class(['providers/providers']) }}">
      <a class="nav-link" href="{{ url('/providers/list') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title">Providers</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['credit/*']) }}">
      <a class="nav-link" href="{{ url('/providers') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title">Credit</span>
      </a>
    </li>

    <li class="nav-item {{ active_class(['providers/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#providers" aria-expanded="{{ is_active_route(['providers/*']) }}" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">providers</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['providers/*']) }}" id="providers">
        <ul class="nav flex-column sub-menu">
        
          <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/providers/providers') }}">List</a>
          </li>
      
        </ul>
      </div>
    </li> 

    {{-- <li class="nav-item {{ active_class(['providers/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="{{ is_active_route(['user-pages/*']) }}" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">settings</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['providers/*']) }}" id="settings">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['settings/login']) }}">
            <a class="nav-link" href="{{ url('/settings/login') }}">Login</a>
          </li>
          <li class="nav-item {{ active_class(['settings/providers']) }}">
            <a class="nav-link" href="{{ url('/settings/register') }}">Register</a>
          </li>
          <li class="nav-item {{ active_class(['settings/lock-screen']) }}">
            <a class="nav-link" href="{{ url('/settings/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>  --}}



    {{-- <li class="nav-item">
      <a class="nav-link" href="https://www.bootstrapdash.com/demo/star-laravel-free/documentation/documentation.html" target="_blank">
        <i class="menu-icon mdi mdi-file-outline"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li> --}}
  </ul>
</nav>