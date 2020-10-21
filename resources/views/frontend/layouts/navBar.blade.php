@if ($page == 'home')
  <header id="header" class="header-transparent">
@else
  <header id="header" style="height: 60px; padding: 14px 0;">
@endif
    <div class="container">
      <div id="logo" class="pull-left">          
        <h1 class="p-0"><a href="{{ route('frontend.home')}}">WAQAF</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
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