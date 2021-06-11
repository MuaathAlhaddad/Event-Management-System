<footer id="footer" style=" background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important; ">
    @if ($page == 'home')    
    <div class="footer-top">
      <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <div class="widget no-box">
                    <h5 class="widget-title">Get Started<span></span></h5>
                    <p>Be a member of volunteering group.</p>
                    <a class="btn" style="border: 1px solid white; bachground-color: white; color:#DA70D6;" href="{{ route('frontend.users.create')}}" target="_blank">Register
                        Now</a>
                </div>
            </div>
            <div class="col-sm-4"></div>

        </div>
      </div>
    </div>
    <hr class="py-1">
    @endif

    <div class="container">
      <div class="copyright" style="color: gray;">
        &copy; Copyright IIUM WAQF MANAGEMENT © 2020. All rights reserved.
      </div>
    </div>
  </footer>