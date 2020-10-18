@extends('frontend.master', ['page' => 'home'])
@section('content')
<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to IIUM WAQAF TIME MANAGEMENT</h1>
      <h2>Where <span class=" text-warning font-weight-bold">Event Management</span>  is fun!</h2>
      <a href="#about" class="btn-get-started">Get Started</a>
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
              IIUM WAQF MANAGEMENT is one of the volunteering platforms that connect students to people to create opportunities for service and social change.
            </p>
          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100">
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Events</h3>
          <p class="section-description">Get ready and Register in any avaiable events</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset("frontend/assets/img/portfolio/portfolio-1.jpg")}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{ asset("frontend/assets/img/portfolio/portfolio-1.jpg")}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{ asset("frontend/assets/img/portfolio/portfolio-2.jpg")}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{ asset("frontend/assets/img/portfolio/portfolio-2.jpg")}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset("frontend/assets/img/portfolio/portfolio-3.jpg")}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="{{ asset("frontend/assets/img/portfolio/portfolio-3.jpg")}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    @include('frontend.pages.home.includes.news')
    

    @include('frontend.pages.home.includes.contact')

  </main>
  <!-- End #main -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
