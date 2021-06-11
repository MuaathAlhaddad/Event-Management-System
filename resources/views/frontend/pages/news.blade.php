@extends('frontend.master', ['page' => 'news'])
@section('content')
<section id="team" style="margin-top: 4rem;">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h3 class="section-title">News</h3>
        <p class="section-description">Latest News of events</p>
      </div>
      <div class="row justify-content-between">
          <div class="col-sm-3 shadow pt-2">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                  <div class="pic"><img src="{{ asset("frontend/assets/img/img1.jpg")}}" alt=""></div>
                  <h4>KICT Community Garden</h4>
                  <span style="height: 150px;">KICT staff and volunteers among the IIUM communities team had communal work at the KICT Garden have been starting of a beautiful and sustainable gardening project and working on the construction of the bedding structure.</span>
                  <span class="font-italic">Date: 20/2/2020</span>
              </div>
          </div>

          <div class="col-sm-3 shadow pt-2">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                  <div class="pic"><img src="{{ asset("frontend/assets/img/56.jpg")}}" alt=""></div>
                  <h4>Clean IIUM Environment</h4>
                  <span style="height: 150px;">IIUM rector and the staff manage a program to maintain a clean environment and a healthy body inside IIUM campus.</span>
                  <span class="font-italic">Date: 25/1/2020</span>
              </div>
          </div>

          <div class="col-sm-3 shadow pt-2">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                  <div class="pic"><img src="{{ asset("frontend/assets/img/clean.jpg")}}" alt=""></div>
                  <h4>Clearing River Trails</h4>
                  <span style="height: 150px;">A group of Post-Graduate students from who are attending a class of Technology, Environment, and
                      Society played their roles as environmental stewards, clearing the river trails in the IIUM Gombak
                      campus.</span>
                  <span class="font-italic">Date: 10/1/2020</span>
              </div>
          </div>
      </div>

     {{--  <div class="row justify-content-between mt-5">
        <div class="col-sm-3 shadow pt-2">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="pic"><img src="{{ asset("frontend/assets/img/img1.jpg")}}" alt=""></div>
                <h4>KICT Community Garden</h4>
                <span style="height: 150px;">KICT staff and volunteers among the IIUM communities team had communal work at the KICT Garden have been starting of a beautiful and sustainable gardening project and working on the construction of the bedding structure.</span>
                <span class="font-italic">Date: 20/10/2020</span>
            </div>
        </div>

        <div class="col-sm-3 shadow pt-2">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="pic"><img src="{{ asset("frontend/assets/img/56.jpg")}}" alt=""></div>
                <h4>Clean IIUM Environment</h4>
                <span style="height: 150px;">IIUM rector and the staff manage a program to maintain a clean environment and a healthy body inside IIUM campus.</span>
                <span class="font-italic">Date: 20/10/2020</span>
            </div>
        </div>

        <div class="col-sm-3 shadow pt-2">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="pic"><img src="{{ asset("frontend/assets/img/clean.jpg")}}" alt=""></div>
                <h4>Clearing River Trails</h4>
                <span style="height: 150px;">A group of Post-Graduate students from who are attending a class of Technology, Environment, and
                    Society played their roles as environmental stewards, clearing the river trails in the IIUM Gombak
                    campus.</span>
                <span class="font-italic">Date: 20/10/2020</span>
            </div>
        </div>
    </div>
    </div> --}}
  </section>
@endsection