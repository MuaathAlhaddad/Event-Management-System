 <!-- ======= Contact Section ======= -->
 <section id="contact" style="background-color:#E6E6FA!important;">
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
              <i class="fa fa-map-marker" style=" color:#7705a4;"></i>
                <p>Jalan Gombak, 53100 <br> Selangor, Malaysia</p>
            </div>

            <div>
              <i class="fa fa-envelope" style=" color:#7705a4;"></i>
              <p>waqaf@iium.edu.my</p>
            </div>

            <div>
              <i class="fa fa-phone" style=" color:#7705a4;"></i>
              <p>+1 5589 55488 55s</p>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="twitter" style=" background-color:#7705a4!important;" ><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook" style=" background-color:#7705a4!important;"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram" style=" background-color:#7705a4!important;"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus" style=" background-color:#7705a4!important;"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin" style=" background-color:#7705a4!important;"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>        

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
               <h5><b>Feedback Form <b></h5>


       <div class="form-multiple-column" data-columncount="5" role="group" aria-labelledby="label_3" data-component="radio" >

                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div><br>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>

           <p>Feedback Type</p>
            <span class="form-radio-item" style="margin: 10px!important;">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_3_0" name="q3_feedbackType" value="Comments"/>
              <label id="label_input_3_0" for="input_3_0" style="margin-right:40px!important;font-size:14px;"> Comments </label>
            </span>
            <span class="form-radio-item">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_3_1" name="q3_feedbackType" value="Bug Reports" />
              <label id="label_input_3_1" for="input_3_1" style="margin-right:40px!important;font-size:14px;"> Bug Reports </label>
            </span>
            <span class="form-radio-item">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_3_2" name="q3_feedbackType" value="Questions" />
              <label id="label_input_3_2" for="input_3_2" style="margin-right:40px!important;font-size:14px;"> Questions </label>
            </span>
          </div><br>


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
              <div class="text-center"><button type="submit"  style="background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important;">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- End Contact Section -->