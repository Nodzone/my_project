<section class="page-section" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">ติดต่อเรา</h2>
              <h3 class="text-bold"><font color="#FFFFFF">อยากให้คำแนะนำหรอ/กรอกข้อความลงในช่องพวกนี้สิ แล้วเราจะติดต่อกลับไป</font></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <form method="post" name="line-notify" action="body/line.php" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" id="name" name="name"  type="text" placeholder="Your Name *" 
                            required="required" data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                            <input class="form-control" id="email" name="email"  type="email" placeholder="Your Email *" 
                            required="required" data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                            <input class="form-control" id="phone"  name="phone" type="tel" placeholder="Your Phone *" 
                            required="required" data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <textarea class="form-control" id="mesg" name="mesg"  placeholder="Your Message *" 
                            required="required" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                          <div id="success"></div>
                          <input type="submit" name="submit"   class="btn btn-primary btn-xl text-uppercase"  value="ส่งข้อความ">
                        </div>
                      </div>
              </form>
            </div>
          </div>
        </div>
      </section>