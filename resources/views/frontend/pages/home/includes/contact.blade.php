 <!-- ======= Contact Section ======= -->
 <section id="contact">
    <div class="container">
      <div class="section-header">
        <h3 class="section-title">Contact</h3>
        <p class="section-description">You are most welcome to reach us any time</p>
      </div>
    </div>

    <!-- Uncomment below if you wan to use dynamic maps -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15933.597983999613!2d101.7346695!3d3.2504767!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf808897bf1163a3!2sInternational%20Islamic%20University%20Malaysia!5e0!3m2!1sen!2smy!4v1593530811850!5m2!1sen!2smy" 
              width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

    <div class="container mt-5">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
                <p>Jalan Gombak, 53100 <br> Selangor, Malaysia</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>waqaf@iium.edu.my</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+1 5589 55488 55s</p>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- End Contact Section -->