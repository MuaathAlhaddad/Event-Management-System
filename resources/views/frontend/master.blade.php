<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.layouts.meta')
  @include('frontend.layouts.styles')
</head>

<body>

    @include('frontend.layouts.navBar')

    @yield('content')

    @include('frontend.layouts.footer')
  @include('frontend.layouts.scripts')
</body>

</html>