
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
                            <li class="footer-nav__item"><a href="<?= base_url('/') ?>index.php/home/homepage">Home</a></li>
                            <li class="footer-nav__item"><a href="<?= base_url('/') ?>index.php/utente/calciomercato">Calciomercato</a></li>
                            <li class="footer-nav__item"><a href="<?= base_url('/') ?>index.php/home/campionato">Treble League</a></li>
                            <li class="footer-nav__item"><a href="<?= base_url('/') ?>index.php/home/champions">Champions League</a></li>
                            <li class="footer-nav__item"><a href="<?= base_url('/') ?>index.php/home/coppa">Coppa Treble</a></li>
                            <li class="footer-nav__item"><a href="<?= base_url('/') ?>index.php/home/albo">Albo d'Oro</a></li>
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
                    <?php
                    //Includo frasi random per la finestra di login
                    include 'randomquotes.php';
                    ?>
                        <p class="modal-account__item-register-txt" style="color: #fff"><?= $txt ?></p>
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
                                        <input type="username" class="form-control" maxlength="16"  name="utente" placeholder="Inserisci il tuo username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" maxlength="16"  name="password" placeholder="Inserisci la tua password...">
                                    </div>
                                    <div class="form-group form-group--pass-reminder">
                                        <label class="checkbox checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1" checked> Ricordami
                                            <span class="checkbox-indicator"></span>
                                        </label>
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
                                <?php
                                echo form_open('utente/password_dimenticata', array(
                                    'class' => 'modal-form'
                                ));
                                ?>
                                    <h5>Password dimenticata</h5>
                                    <div class="form-group">
                                        <input type="email" class="form-control" maxlength="50"  name="email_dimenticata1" placeholder="Inserisci indirizzo email...">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" maxlength="50"  name="email_dimenticata2" placeholder="Ripeti indirizzo email...">
                                    </div>
                                    <div class="form-group form-group--pass-reminder">
                                        <label class="checkbox checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1" checked> Ricordami
                                            <span class="checkbox-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="form-group form-group--submit">
                                        <!-- Button 
                                        <a href="shop-account.html" class="btn btn-primary-inverse btn-block">Entra</a>
                                        -->
                                        <input type="submit" value="Invia nuova password" class="btn btn-primary-inverse btn-block" />
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
                                <!-- Register Form / End -->

                            </div>
                            <!-- Tab: Register / End -->

                        </div>

                        <!-- Nav tabs -->
                        <div class="nav-tabs-login-wrapper">
                            <ul class="nav nav-tabs nav-justified nav-tabs--login" role="tablist">
                                <li role="presentation" class="active"><a href="#tab-login" role="tab" data-toggle="tab">Login</a></li>
                                <li role="presentation"><a href="#tab-register" role="tab" data-toggle="tab">Password dimenticata ?</a></li>
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