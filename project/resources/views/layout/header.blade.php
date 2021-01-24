<nav class="navbar noprint default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo text-black" href="{{ url('/') }}">
      <!-- <img src="{{ url('assets/images/logo.svg') }}" alt="logo" /> -->
   <span class='text-black pll-left'>Inventory</span>   
       </a>
    <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
      <!-- <img src="{{ url('assets/images/logo-mini.svg') }}" alt="logo" />  -->
      <span class='text-black'>ZI</span>
      </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
  
    <ul class="navbar-nav navbar-nav-right">
    
    <li class="nav-item dropdown language-dropdown show">
              <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="true">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="flag-icon flag-icon-us"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">{{Config::get("app.locale")}} </span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2 " 
              aria-labelledby="LanguageDropdown">
                <a  href="{{ route('locale.setting', 'en') }}" class="dropdown-item">
                  <div class="flag-icon-holder">
                    <i class="flag-icon flag-icon-us"></i>
                  </div>English
                </a>
                <a  href="{{ route('locale.setting', 'am') }}" class="dropdown-item">
                  <div class="flag-icon-holder">
                    <i class="flag-icon flag-icon-fr"></i>
                  </div>Amharic
                </a>
              
      
              </div>
            </li> 
    
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex">{{Auth::user()->name}}</span>
          <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face8.jpg') }}" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
        
          <a class="dropdown-item mt-2"> Manage Account </a>
          <a class="dropdown-item"> Change Password </a>
       
          <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>



        </div>
      </li>
    </ul>

  </div>
</nav>