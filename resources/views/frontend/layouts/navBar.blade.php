<style>

  #header{background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important;
  }
header{
  color: white!important;
}

</style>
@if ($page == 'home')
  <header id="header"    style="height: 65px!important; padding: 12px 0;"    class="header-transparent">
@else
  <header id="header" style="height: 65px!important; padding: 12px 0;">
@endif
    <div class="container">
      <div id="logo" class="pull-left" style="margin-left:-60px!important; margin-top:-5px!important;">   
       <img src="{{ asset("frontend/assets/img/2.png")}}" alt="" width="50" height="50"> 
       <h4 style=" margin: 4px; padding:4px; float:right; background-:white!important;" ><b> IIUM WAQAF TIME MANAGEMENT</b></h4>

  {{-- <h1 class="p-0"><a href="{{ route('frontend.home')}}">WAQAF</a></h1> --}}
      </div>

      <nav id="nav-menu-container" style="color:black!important;" >
        <ul class="nav-menu" >
          <li class="menu-active"><a href="{{ route('frontend.home')}}">Home</a></li>
          @if ($page == 'home')  
          <li><a href="#about">About Us</a></li>
          @endif
          <li><a href="{{ $page == 'home' ?  '#portfolio' : route('frontend.events.index')}} ">Events</a></li>
          <li><a href=" {{ $page == 'home' ?  '#team' : route('frontend.news')}} ">News</a></li>
          @if ($page == 'home')  
            <li><a href="#contact">Contact Us</a></li>
          @endif

          @auth    
          <li class="menu-has-children"><a href="">{{Auth::user()->first_name}}</a>
            <ul>
              <li>
                  <a href="{{ route('frontend.users.show', Auth::id()) }}">
                      <i class="nav-icon fas fa-user"></i>
                      Profile
                  </a>
              </li>
              <li>
                  <a href="www.google.com" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                      <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                      {{ trans('global.logout') }}
                  </a>
              </li>
            </ul>
          </li>
          <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
         
          @endauth
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  <!-- End Header -->