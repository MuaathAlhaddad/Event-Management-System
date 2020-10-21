@extends('frontend.master', ['page' => 'home'])
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <h1>Welcome to IIUM WAQAF TIME MANAGEMENT</h1>
        <h2>Where <span class=" text-warning font-weight-bold">Event Management</span> is fun!</h2>
        <a href="{{route('frontend.events.index')}}" class="btn-get-started">Get Started</a>
    </div>
</section>
<!-- End Hero Section -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about">
        <div class="container" data-aos="fade-up">
            <div class="row about-container">

                <div class="col-lg-6 content order-lg-1 order-2">
                    <h2 class="title">Few Words About Us</h2>
                    <p>
                        IIUM WAQF MANAGEMENT is one of the volunteering platforms that connect students to people to
                        create opportunities for service and social change.
                    </p>
                </div>

                <div class="col-lg-6 order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100">
                  <img class="border shadow p-2" src="{{asset('frontend/assets/img/24.jpg')}}" width="400" height="auto" alt="">
                  
                </div>
            </div>

            <div class="row justify-content-around">
                <div class="col-lg-3 m-4" data-aos="fade-left" data-aos-delay="100">
                    <img class="border shadow p-2" src="{{asset('frontend/assets/img/20.jpg')}}" width="320" height="auto" alt="">
                </div>
                <div class="col-lg-3 m-4" data-aos="fade-left" data-aos-delay="100">
                    <img class="border shadow p-2" src="{{asset('frontend/assets/img/21.png')}}" width="320" height="auto" alt="">
                </div>
                <div class="col-lg-3 m-4" data-aos="fade-left" data-aos-delay="100">
                    <img class="border shadow p-2" src="{{asset('frontend/assets/img/12.jpg')}}" width="320" height="auto" alt="">
                </div>
            </div>
    </section><!-- End About Section -->

    <!-- ======= Events Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Events</h3>
                <p class="section-description">Get ready and Register in any avaiable events</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200" style="margin-top: 150px">
                @if (isset($events))
                @foreach ($events as $event)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset("frontend/assets/img/12.jpg")}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$event->name}}</h4>
                        <p>{{$event->desc}}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="row float-right">
              <a href="{{ route('frontend.events.index')}} " class="btn"
                  style=" color: #2dc997; border: 1px solid #2dc997">see more >></a>
          </div>

        </div>
    </section><!-- End Portfolio Section -->

    @include('frontend.pages.home.includes.news')


    @include('frontend.pages.home.includes.contact')

</main>
<!-- End #main -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection