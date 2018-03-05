    <!-- Footer
    ================================================== -->
    <footer id="footer" class="footer">
    
      <!-- Footer Widgets -->
      <div class="footer-widgets">
          
        <div class="footer-widgets__inner">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="footer-col-inner">
    
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="footer-col-inner">
                  
                </div>
              </div>
              <div class="clearfix visible-sm"></div>
              <div class="col-sm-6 col-md-3">
                <div class="footer-col-inner">
                  
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="footer-col-inner">              
    
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Sponsors -->
        <div class="container">
          <div class="sponsors">
            <h6 class="sponsors-title">Our Sponsors:</h6>
            <ul class="sponsors-logos">
              <li class="sponsors__item">
                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/sponsor-visa.png" alt=""></a>
              </li>
              <li class="sponsors__item">
                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/sponsor-discover.png" alt=""></a>
              </li>
              <li class="sponsors__item">
                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/sponsor-paypal.png" alt=""></a>
              </li>
              <li class="sponsors__item">
                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/sponsor-skrill.png" alt=""></a>
              </li>
              <li class="sponsors__item">
                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/sponsor-westernunion.png" alt=""></a>
              </li>
              <li class="sponsors__item">
                <a href="#"><img src="<?= base_url('/') ?>assets/images/samples/sponsor-payoneer.png" alt=""></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Sponsors / End -->
    
      </div>
      <!-- Footer Widgets / End -->
    
      <!-- Footer Secondary -->
      <div class="footer-secondary">
        <div class="container">
          <div class="footer-secondary__inner">
            <div class="row">
              <div class="col-md-4">
                <div class="footer-copyright"><a href="_soccer_index.html">FantaTreble </a> since 2010 &nbsp; | &nbsp; All Rights Reserved</div>
              </div>
              <div class="col-md-8">
                <ul class="footer-nav footer-nav--right footer-nav--condensed footer-nav--sm">
                  <li class="footer-nav__item"><a href="#">Home</a></li>
                  <li class="footer-nav__item"><a href="#">Features</a></li>
                  <li class="footer-nav__item"><a href="#">Statistics</a></li>
                  <li class="footer-nav__item"><a href="#">The Team</a></li>
                  <li class="footer-nav__item"><a href="#">News</a></li>
                  <li class="footer-nav__item"><a href="#">Shop</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Secondary / End -->
    </footer>
    <!-- Footer / End -->
    
    
    <!-- Login/Register Tabs Modal -->
    <div class="modal fade" id="modal-login-register-tabs" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
    
            <div class="modal-account-holder">
              <div class="modal-account__item modal-account__item--logo">
                <p class="modal-account__item-register-txt">Don’t have an account? <a href="#">Register Now</a> and enjoy all our benefits!</p>
              </div>
              <div class="modal-account__item">
    
                <!-- Tab panes -->
                <div class="tab-content">
    
                  <!-- Tab: Login -->
                  <div role="tabpanel" class="tab-pane fade in active" id="tab-login">
    
                    <!-- Login Form -->
                    <!--Vecchio form
                    <form action="#" class="modal-form">
                    -->
                    <?php 
                    echo form_open('utente/login', array(
                        'class' => 'modal-form'
                    ));    
                    ?>
                      <h5>Login</h5>
                      <div class="form-group">
                        <input type="username " class="form-control" maxlength="16"  name="utente" placeholder="Inserisci il tuo username...">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" maxlength="16"  name="password" placeholder="Inserisci la tua password...">
                      </div>
                      <div class="form-group form-group--pass-reminder">
                        <label class="checkbox checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox1" value="option1" checked> Ricordami
                          <span class="checkbox-indicator"></span>
                        </label>
                        <a href="#">Password dimenticata ?</a>
                      </div>
                      <div class="form-group form-group--submit">
                        <!-- Button 
                        <a href="shop-account.html" class="btn btn-primary-inverse btn-block">Entra</a>
                        -->
                        <input type="submit" value="Login" class="btn btn-primary-inverse btn-block" />
                      </div>
                      
                      <div class="modal-form--social">
                        <h7>
                        <?php
                        if (validation_errors()) { 
                            echo validation_errors();
                        }
                        if (@$message) {
                            echo @$message;
                        }
                        ?> 
                        </h7>
                      </div>
                    </form>
                    <!-- Login Form / End -->
    
                  </div>
                  <!-- Tab: Login / End -->
    
                  <!-- Tab: Register -->
                  <div role="tabpanel" class="tab-pane fade" id="tab-register">
    
                    <!-- Register Form -->
                    <form action="#" class="modal-form">
                      <h5>Registrati!</h5>
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter your email address...">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter your password...">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Repeat your password...">
                      </div>
                      <div class="form-group form-group--submit">
                        <a href="shop-account.html" class="btn btn-success btn-block">Create Your Account</a>
                      </div>
                      <div class="modal-form--note">You’ll receive a confirmation email in your inbox with a link to activate your account. </div>
                    </form>
                    <!-- Register Form / End -->
    
                  </div>
                  <!-- Tab: Register / End -->
    
                </div>
    
                <!-- Nav tabs -->
                <div class="nav-tabs-login-wrapper">
                  <ul class="nav nav-tabs nav-justified nav-tabs--login" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-login" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation"><a href="#tab-register" role="tab" data-toggle="tab">Registrati</a></li>
                  </ul>
                </div>
                <!-- Nav tabs / End -->
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login/Register Tabs Modal / End -->
    
    
  </div>

  <!-- Javascript Files
  ================================================== -->
  <!-- Core JS -->
  <script src="<?= base_url('/') ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('/') ?>assets/js/core-min.js"></script>
  
  <!-- Vendor JS -->
  <script src="<?= base_url('/') ?>assets/vendor/twitter/jquery.twitter.js"></script>
  
  
  <!-- Template JS -->
  <script src="<?= base_url('/') ?>assets/js/init.js"></script>
  <script src="<?= base_url('/') ?>assets/js/custom.js"></script>
  
  </body>
  </html>