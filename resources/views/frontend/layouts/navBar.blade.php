@if ($page == 'home')
  <header id="header" class="header-transparent">
@else
  <header id="header">

@endif
    <div class="container">
      <div id="logo" class="pull-left">          
        <h1 class="p-0"><a href="{{ route('frontend.home')}}">WAQAF</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{ route('frontend.home')}}">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#portfolio">Events</a></li>
          <li><a href="#team">News</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  <!-- End Header -->